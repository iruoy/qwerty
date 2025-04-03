<?php

declare(strict_types=1);

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public ?User $user;

    #[Validate]
    public string $name = '';

    #[Validate]
    public string $email = '';

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class, 'email')->ignore($this->user)],
        ];
    }

    public function setUser(User $user): void
    {
        $this->user = $user;

        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function store(): void
    {
        $validated = $this->validate();

        User::create($validated);
    }

    public function update(): void
    {
        $validated = $this->validate();

        $this->user->update($validated);
    }
}
