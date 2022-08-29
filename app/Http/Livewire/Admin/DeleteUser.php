<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class DeleteUser extends Component
{
    public function destroy(User $user)
    {
        User::destroy($user->id);
        $this->reset();
    }
    public function render()
    {
        return view('livewire.admin.delete-user',
        [
            'users' => User::whereNot('email', auth()->user()->email)->get(['id', 'name', 'email', 'is_admin'])
        ]
    );
    }
}
