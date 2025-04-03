<?php

declare(strict_types=1);

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public ?User $user = null;

    #[Validate]
    public string $name = '';

    #[Validate]
    public string $email = '';

    #[Validate]
    public string $password = '';

    #[Validate]
    public string $password_confirmation = '';

    protected function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['string', Password::defaults(), 'confirmed'],
        ];

        if (isset($this->user)) {
            $rules['email'][] = Rule::unique(User::class, 'email')->ignore($this->user);
        } else {
            array_unshift($rules['password'], 'required');
        }

        return $rules;
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
