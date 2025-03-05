<?php

namespace App\Livewire\Operator;

use App\Models\Barang;
use App\Models\PeminjamanItem;
use App\Models\Peminjaman as PeminjamanPerson;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Peminjaman extends Component
{
    public $rfid = '';
    public $message = '';
    public $status = 'idle';
    public $person = null;
    public $currentStep = 1;
    public $search = '';
    public $keperluan = '';
    public $lama_pinjam = null;

    public $steps = [
        1 => 'Scan RFID',
        2 => 'Pilih Barang',
        3 => 'Konfirmasi',
    ];

    public $selectedItems = [];

    protected $listeners = ['refresh' => '$refresh'];

    public function mount()
    {
        $this->resetFormRFID();
    }

    public function nextStep()
    {
        if ($this->currentStep < count($this->steps)) {
            $this->currentStep++;
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function updatedRfid()
    {
        if (strlen($this->rfid) >= 8) {
            $this->processRfid();
        }
    }

    public function resetFormRFID()
    {
        $this->rfid = '';
        $this->message = '';
        $this->status = 'idle';

        if ($this->person !== null) {
            $this->currentStep++;
        }
    }

    public function resetForm()
    {
        $this->keperluan = '';
        $this->lama_pinjam = null;
    }

    public function processRfid()
    {
        if (empty($this->rfid)) {
            return;
        }

        $this->status = 'scanning';

        try {
            $this->person = Person::where('rfid', $this->rfid)->first();

            if ($this->person) {
                $this->status = 'success';
                $this->message = "RFID berhasil di scan! ";
            } else {
                $this->status = 'error';
                $this->message = 'RFID tidak terdaftar';
            }

            $this->dispatch('resetAfterDelay');
        } catch (\Exception $e) {
            $this->status = 'error';
            $this->message = 'Terjadi kesalahan: ' . $e->getMessage();
            $this->dispatch('resetAfterDelay');
        }

        $this->rfid = '';
    }

    public function getFilteredBarangsProperty()
    {
        return Barang::when($this->search, function ($query) {
            $query->where('nama', 'like', '%' . trim($this->search) . '%');
        })
            ->latest()
            ->get();
    }
    public function addItem($barangId)
    {
        $barang = Barang::find($barangId);
        if ($barang && $barang->stok > 0) {
            if (isset($this->selectedItems[$barangId])) {
                if ($this->selectedItems[$barangId]['quantity'] < $barang->stok) {
                    $this->selectedItems[$barangId]['quantity']++;
                }
            } else {
                $this->selectedItems[$barangId] = [
                    'id' => $barang->id,
                    'nama' => $barang->nama,
                    'quantity' => 1,
                    'tipe' => $barang->tipe,
                    'max_stok' => $barang->stok
                ];
            }
        }
    }

    public function incrementItem($barangId)
    {
        $barang = Barang::find($barangId);
        if ($barang && isset($this->selectedItems[$barangId])) {
            if ($this->selectedItems[$barangId]['quantity'] < $barang->stok) {
                $this->selectedItems[$barangId]['quantity']++;
            }
        }
    }

    public function decrementItem($barangId)
    {
        if (isset($this->selectedItems[$barangId])) {
            if ($this->selectedItems[$barangId]['quantity'] > 1) {
                $this->selectedItems[$barangId]['quantity']--;
            } else {
                unset($this->selectedItems[$barangId]);
            }
        }
    }

    public function updatedSearch()
    {
        $this->dispatch('refresh');
    }

    public function savePeminjaman()
    {
        $this->validate([
            'keperluan' => 'required|string',
            'lama_pinjam' => 'required|date',
        ]);

        DB::beginTransaction();

        try {
            $peminjaman = PeminjamanPerson::create([
                'people_id' => $this->person->id,
                'status' => 'sedang dipinjam',
                'tanggal_pinjam' => Carbon::now(),
                'lama_pinjam' => $this->lama_pinjam,
                'tanggal_kembali' => null,
                'keperluan' => $this->keperluan,
                'total_barang' => collect($this->selectedItems)->sum('quantity'),
            ]);

            foreach ($this->selectedItems as $item) {
                PeminjamanItem::create([
                    'peminjaman_id' => $peminjaman->id,
                    'barang_id' => $item['id'],
                    'jumlah_barang' => $item['quantity'],
                ]);

                $barang = Barang::find($item['id']);
                if ($barang) {
                    $barang->stok -= $item['quantity'];
                    $barang->save();
                }
            }

            DB::commit();

            $this->currentStep = 4;
            $this->status = 'success';
            $this->message = 'Barang berhasil dikembalikan';
            $this->dispatch('peminjaman-saved');
            $this->resetForm();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->currentStep = 4;
            $this->status = 'error';
            $this->message = "Terjadi kesalahan: " . $e->getMessage();
        }
    }

    #[Title('Peminjaman')]
    public function render()
    {
        return view('livewire.operator.peminjaman');
    }
}
