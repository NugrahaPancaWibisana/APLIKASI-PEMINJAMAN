<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\Person as Guru;

class Person extends Component
{
    use WithPagination;

    public $name;
    public $rfid;
    public $nip;
    public $no_wa;
    public $jabatan = 'guru';
    public $personId;
    public $isEditing = false;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'rfid' => 'required|string|unique:people,rfid,' . $this->personId,
            'nip' => 'required|string|max:255',
            'no_wa' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ];
    }

    public function mount()
    {
        $this->jabatan = 'guru';
    }

    public function create()
    {
        $validate = $this->validate();
        
        if ($this->isEditing) {
            $person = Guru::find($this->personId);
            $person->update($validate);
            $this->dispatch('notify', 'Data guru berhasil diperbarui!', 'success');
        } else {
            Guru::create($validate);
            $this->dispatch('notify', 'Data guru berhasil ditambahkan!', 'success');
        }
        
        $this->reset(['name', 'rfid', 'nip', 'no_wa', 'personId', 'isEditing']);
        $this->jabatan = 'guru';
    }

    public function edit($id)
    {
        $this->isEditing = true;
        $this->personId = $id;
        
        $person = Guru::find($id);
        $this->name = $person->name;
        $this->rfid = $person->rfid;
        $this->nip = $person->nip;
        $this->no_wa = $person->no_wa;
        $this->jabatan = $person->jabatan;
    }

    public function cancelEdit()
    {
        $this->reset(['name', 'rfid', 'nip', 'no_wa', 'personId', 'isEditing']);
        $this->jabatan = 'guru';
    }

    public function delete($id)
    {
        $person = Guru::find($id);
        $person->delete();
        $this->dispatch('notify', 'Data guru berhasil dihapus!', 'success');
    }

    #[Title('Guru Admin MRC')]
    public function render()
    {
        $people = Guru::latest()->paginate(5);
        return view('livewire.admin.person', [
            'people' => $people
        ]);
    }
    
      public function updated($propertyName)
    {
        if (in_array($propertyName, ['rfid', 'nip', 'no_wa'])) {
            $this->{$propertyName} = preg_replace('/[^0-9]/', '', $this->{$propertyName});
        }
    }
}