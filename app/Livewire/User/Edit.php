<?php

declare(strict_types=1);

namespace App\Livewire\User;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Edit extends Component
{
    public UserForm $form;

    public function mount(User $user): void
    {
        $this->form->setUser($user);
    }

    public function save(): void
    {
        $this->form->update();

        session()->flash('status', __('User successfully updated.'));

        redirect()->route('users.index');
    }

    public function render(): View
    {
        return view('livewire.user.edit');
    }
}
