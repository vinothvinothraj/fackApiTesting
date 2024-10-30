<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use App\Models\UserInformation;
use Laravel\Jetstream\InteractsWithBanner;

class UserIndex extends Component
{

    use InteractsWithBanner;
    public $userDetails;
    public $selectedUserDetails;
    public $showModal = false;
    public $showDeleteModal = false;

    public function mount()
    {
        $this->userDetails = UserInformation::with('user')->get();
    }


    public function viewUserDetails($id)
    {
        $this->selectedUserDetails = User::with('userInformation')->find($id);
        if ($this->selectedUserDetails) {
            $this->showModal = true;
        }
    }


    public function closeModal()
    {
        $this->showModal = false;
    }


    public function confirmDelete($id)
    {
        $this->selectedUserDetails = User::find($id);
        $this->showDeleteModal = true;
    }


    public function deleteUser()
    {
        if ($this->selectedUserDetails) {
            $this->selectedUserDetails->userInformation->delete();
            $this->selectedUserDetails->delete();


            $this->userDetails = UserInformation::with('user')->get();


            $this->banner('User details deleted successfully.');
        }

        $this->showDeleteModal = false;
    }
    public function render()
    {
        return view('livewire.user.user-index')->layout('layouts.app');
    }
}
