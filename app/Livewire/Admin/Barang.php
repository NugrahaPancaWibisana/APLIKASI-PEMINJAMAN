<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Storage;

class Barang extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $image;
    public $nama;
    public $stok;
    public $tipe;
    public $barangId;
    public $isEditing = false;

    protected function rules()
    {
        return [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama' => 'required|string|max:255',
            'stok' => 'required|integer|min:1',
            'tipe' => 'required|string',
        ];
    }

    public function create()
    {
        $validate = $this->validate();
        
        if ($this->isEditing) {
            $barang = \App\Models\Barang::find($this->barangId);
            
            if ($this->image) {
                $imageName = time() . '.' . $this->image->getClientOriginalExtension();
                $validate['image'] = $this->image->storeAs('uplouds', $imageName, 'public');
                
                if ($barang->image && Storage::disk('public')->exists($barang->image)) {
                    Storage::disk('public')->delete($barang->image);
                }
            } else {
                unset($validate['image']);
            }
            
            $barang->update($validate);
            $this->dispatch('notify', 'Data barang berhasil diperbarui!', 'success');
        } else {
            if ($this->image) {
                $imageName = time() . '.' . $this->image->getClientOriginalExtension();
                $validate['image'] = $this->image->storeAs('uplouds', $imageName, 'public');
            }
            
            \App\Models\Barang::create($validate);
            $this->dispatch('notify', 'Data barang berhasil ditambahkan!', 'success');
        }
        
        $this->reset(['image', 'nama', 'stok', 'tipe', 'barangId', 'isEditing']);
    }

    public function edit($id)
    {
        $this->isEditing = true;
        $this->barangId = $id;
        
        $barang = \App\Models\Barang::find($id);
        $this->nama = $barang->nama;
        $this->stok = $barang->stok;
        $this->tipe = $barang->tipe;
    }

    public function cancelEdit()
    {
        $this->reset(['image', 'nama', 'stok', 'tipe', 'barangId', 'isEditing']);
    }

    public function delete($id)
    {
        $barang = \App\Models\Barang::find($id);
        
        if ($barang->image && Storage::disk('public')->exists($barang->image)) {
            Storage::disk('public')->delete($barang->image);
        }
        
        $barang->delete();
        $this->dispatch('notify', 'Data barang berhasil dihapus!', 'success');
    }

    #[Title('Barang Admin MRC')]
    public function render()
    {
        $barangs = \App\Models\Barang::latest()->paginate(4);
        return view('livewire.admin.barang', [
            'barangs' => $barangs,
        ]);
    }
}