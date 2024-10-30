<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use App\Models\UserInformation;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\InteractsWithBanner;

class UserCreate extends Component
{
    use InteractsWithBanner;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $confirm_password;
    public $nic_id;
    public $gender;
    public $user_type;

    public $description = '';

    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
        'confirm_password' => 'required|string|min:8|same:password',
        'nic_id' => 'required|string|max:20|unique:user_information,nic_id',
        'gender' => 'required|string|in:male,female,other',
        'user_type' => 'required|string|in:admin,SE,ASE,customer',
        'description' => 'required|string|max:255',
    ];

    public function createUser()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->first_name . ' ' . $this->last_name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        UserInformation::create([
            'user_id' => $user->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'user_type' => $this->user_type,
            'nic_id' => $this->nic_id,
            'gender' => $this->gender,
            'email' => $this->email,
            'description' => $this->description,

        ]);

        $this->banner('User Created Successfully');
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
        $this->description = '';

        $this->resetValidation();
    }
    public function render()
    {
        return view('livewire.user.user-create')->layout('layouts.app');
    }
}
