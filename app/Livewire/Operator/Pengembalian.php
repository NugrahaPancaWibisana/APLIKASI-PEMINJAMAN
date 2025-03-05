<?php

namespace App\Livewire\Operator;

use App\Models\Barang;
use App\Models\Peminjaman;
use App\Models\Person;
use Carbon\Carbon;
use Livewire\Attributes\Title;
use Livewire\Component;

class Pengembalian extends Component
{
    public $rfid = '';
    public $message = '';
    public $status = 'idle';
    public $person = null;
    public $currentStep = 1;
    public $steps = [
        1 => 'Scan RFID',
        2 => 'Pengembalian barang',
        3 => 'Konfirmasi',
        4 => 'Selesai'
    ];
    public $peminjaman;

    public function mount()
    {
        $this->resetFormRFID();
    }

    public function updatedRfid()
    {
        if (strlen($this->rfid) >= 8) {
            $this->processRfid();
        }
    }

    public function nextStep($id)
    {
        $this->peminjaman = Peminjaman::with('items.barang')->findOrFail($id);

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

    public function resetFormRFID()
    {
        $this->rfid = '';
        $this->message = '';
        $this->status = 'idle';

        if ($this->person !== null) {
            $this->currentStep++;
        }
    }

    public function processRfid()
    {
        if (empty($this->rfid)) {
            return;
        }

        $this->status = 'scanning';

        try {
            $this->person = Person::where('rfid', $this->rfid)
                ->with([
                    'peminjaman.items.barang'
                ])
                ->first();


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

    public function selesaiPeminjaman()
    {
        try {
            $this->peminjaman->status = 'telah dikembalikan';
            $this->peminjaman->tanggal_kembali = Carbon::now();

            foreach ($this->peminjaman->items as $item) {
                $barang = Barang::find($item->barang_id);
                if ($barang) {
                    $barang->stok += $item->jumlah_barang;
                    $barang->save();
                }
            }

            $this->peminjaman->save();

            $this->currentStep = 4;
            $this->status = 'success';
            $this->message = 'Barang berhasil dikembalikan';
            $this->dispatch('pengembalian');
        } catch (\Exception $e) {
            $this->currentStep = 4;
            $this->status = 'error';
            $this->message = "Terjadi kesalahan: " . $e->getMessage();
            $this->dispatch('pengembalian');
        }
    }

    #[Title('Pengembalian')]
    public function render()
    {
        return view('livewire.operator.pengembalian');
    }
}
