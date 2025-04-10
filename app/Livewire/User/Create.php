<?php

declare(strict_types=1);

namespace App\Livewire\User;

use App\Livewire\Forms\UserForm;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Create extends Component
{
    public UserForm $form;

    public function save(): void
    {
        $this->form->store();

        session()->flash('status', __('User successfully created.'));

        $this->redirectRoute('users.index', navigate: true);
    }

    public function render(): View
    {
        return view('livewire.user.create');
    }
}
