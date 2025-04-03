<div>
    <flux:heading size="xl" level="1" class="mb-4">{{ __('Users') }}</flux:heading>

    <flux:table :paginate="$this->users">
        <flux:table.columns>
            <flux:table.column sortable :sorted="$sortBy === 'name'" :direction="$sortDirection" wire:click="sort('name')">{{ __('Name') }}</flux:table.column>
            <flux:table.column sortable :sorted="$sortBy === 'email'" :direction="$sortDirection" wire:click="sort('email')">{{ __('Email') }}</flux:table.column>
            <flux:table.column sortable :sorted="$sortBy === 'verified'" :direction="$sortDirection" wire:click="sort('verified')">{{ __('Verified') }}</flux:table.column>
            <flux:table.column sortable :sorted="$sortBy === 'created_at'" :direction="$sortDirection" wire:click="sort('created_at')">{{ __('Created at') }}</flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach ($this->users as $user)
                <flux:table.row :key="$user->id">
                    <flux:table.cell>{{ $user->name }}</flux:table.cell>

                    <flux:table.cell>{{ $user->email }}</flux:table.cell>

                    <flux:table.cell>
                        <flux:badge size="sm" :color="$user->hasVerifiedEmail() ? 'green' : 'red'" :icon="$user->hasVerifiedEmail() ? 'check' : 'x-mark'" inset="top bottom">
                            {{ $user->hasVerifiedEmail() ? __('Yes') : __('No') }}
                        </flux:badge>
                    </flux:table.cell>

                    <flux:table.cell>{{ $user->created_at }}</flux:table.cell>

                    <flux:table.cell>
                        <flux:button size="sm" icon="pencil-square" href="{{ route('users.edit', $user) }}" inset="top bottom">{{ __('Edit') }}</flux:button>
                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>
</div>
