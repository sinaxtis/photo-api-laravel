<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserModelTest extends TestCase
{
    public function testCreatingAUser()
    {
        // Create a User
        $user = factory(User::class)->create([
            'name' => 'bobsmith',
            'email' => 'bob@example.com',
        ]);
        $this->assertDatabaseHas('users', ['email' => 'bob@example.com']);
        // Verify it works
        $saved = User::where('email', 'bob@example.com')->first();
        $this->assertEquals($saved->id, 1);
        $this->assertEquals($saved->name, 'bobsmith');
    }
}
