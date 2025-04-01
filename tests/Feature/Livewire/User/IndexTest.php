<?php

declare(strict_types=1);

use App\Livewire\User\Index;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

it('renders successfully', function () {
    Livewire::test(Index::class)
        ->assertStatus(200);
});
