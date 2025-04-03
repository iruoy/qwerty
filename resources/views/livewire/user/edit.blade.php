<div>
    <flux:heading size="xl" level="1" class="mb-4">{{ __('Edit user') }}</flux:heading>

    <form wire:submit="save" class="grid gap-6">
        <flux:input wire:model.blur="form.name" label="{{ __('Name') }}" icon="user" placeholder="John Doe" />

        <flux:input type="email" wire:model.blur="form.email" label="{{ __('Email') }}" icon="envelope" placeholder="john.doe@example.com" />

        <div>
            <flux:button type="submit">{{ __('Save changes') }}</flux:button>
        </div>
    </form>
</div>
