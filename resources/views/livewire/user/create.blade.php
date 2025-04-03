<div>
    <flux:heading size="xl" level="1" class="mb-4">{{ __('Create user') }}</flux:heading>

    <div class="max-w-lg">
        <form wire:submit="save" class="grid gap-6">
            <flux:input wire:model.blur="form.name" label="{{ __('Name') }}" icon="user" placeholder="John Doe" />

            <flux:input type="email" wire:model.blur="form.email" label="{{ __('Email') }}" icon="envelope" placeholder="john.doe@example.com" />

            <flux:input type="password" wire:model.blur="form.password" label="{{ __('Password') }}" icon="lock-closed" />

            <flux:input type="password" wire:model.blur="form.password_confirmation" label="{{ __('Confirm password') }}" icon="lock-closed" />

            <div>
                <flux:button type="submit" variant="primary">{{ __('Save') }}</flux:button>
            </div>
        </form>
    </div>
</div>
