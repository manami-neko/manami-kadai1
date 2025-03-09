<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class AdminModal extends Component
{
    public $contact;
    public $showModal = false;

    protected $listeners = [
        'openModal' => "openModal",
        'closeModal' => "closeModal"
    ];

    public function openModal($id)
    {
        $this->contact = Contact::with('category')->find($id);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function deleteContact()
    {
    $this->contact->delete();
    $this->emit('contactDeleted');
    $this->contact = null;
    $this->closeModal();
    }


    public function render()
    {
        return view('livewire.admin-modal');
    }
}