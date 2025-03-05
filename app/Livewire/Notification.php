<?php

namespace App\Livewire;

use Livewire\Component;

class Notification extends Component
{
    public $message = '';
    public $type = '';
    public $show = false;

    protected $listeners = ['notify'];

    public function notify($message, $type = 'success')
    {
        $this->message = $message;
        $this->type = $type;
        $this->show = true;

        $this->dispatch('notificationShown');
    }

    public function dismiss()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('components.notification');
    }
}
