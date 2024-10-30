<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\InteractsWithBanner;

class UserUpdate extends Component
{

    use InteractsWithBanner;

    public User $user;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $confirm_password;
    public $nic_id;
    public $gender;
    public $user_type;

    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . '{{$this->user->id}}',
        'password' => 'nullable|string|min:8', 
        'confirm_password' => 'nullable|string|min:8|same:password',
        'nic_id' => 'required|string|max:20|unique:user_information,nic_id,' . '{{$this->user->userInformation->id}}',
        'gender' => 'required|string|in:male,female,other',
        'user_type' => 'required|string|in:admin,driver,conductor,customer',
    ];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->first_name = $user->userInformation->first_name;
        $this->last_name = $user->userInformation->last_name;
        $this->email = $user->email;
        $this->nic_id = $user->userInformation->nic_id;
        $this->gender = $user->userInformation->gender;
        $this->user_type = $user->userInformation->user_type;
    }

    public function updateUser()
    {
        $this->validate();

        
        $this->user->update([
            'name' => $this->first_name . ' ' . $this->last_name,
            'email' => $this->email,
            'password' => $this->password ? Hash::make($this->password) : $this->user->password, 
        ]);

        
        $this->user->userInformation->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'user_type' => $this->user_type,
            'nic_id' => $this->nic_id,
            'gender' => $this->gender,
        ]);

        $this->banner('User updated successfully');
        $this->resetForm();
        return redirect('/users');
    }

    public function goBack()
    {
        return redirect('/users');
    }

    public function resetForm()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->password = '';
        $this->confirm_password = '';
        $this->nic_id = '';
        $this->gender = '';
        $this->user_type = '';

        $this->resetValidation();
    }
    public function render()
    {
        return view('livewire.user.user-update')->layout('layouts.app');
    }
}
