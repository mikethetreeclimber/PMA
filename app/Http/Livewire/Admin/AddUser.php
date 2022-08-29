<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AddUser extends Component
{
    public $name;
    public $email;
    public $password;
    public $success = false;
    public $is_admin = false;
 
    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        'password' => 'required|min:8',
        'is_admin' => 'required',
    ];
 
    public function submit()
    {
        $this->validate();
 
        // Execution doesn't reach here if validation fails.
 
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'is_admin' => $this->is_admin,
        ]);

        $this->success = true;
    }

    public function render()
    {
        return view('livewire.admin.add-user');
    }
}
