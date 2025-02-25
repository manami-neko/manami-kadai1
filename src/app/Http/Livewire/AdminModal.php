<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class AdminModal extends Component
{
    public $contact;
    public $showModal = false;

    protected $listeners = ['openModal' => "openModal"];

    public function openModal($id)
    {
        $this->contact = Contact::with('category')->find($id);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.admin-modal');
    }

    public function deleteContact()
    {
    Contact::$this->contact->delete();
    // session()->flash('message', '削除しました');
    $this->closeModal();
    }
}