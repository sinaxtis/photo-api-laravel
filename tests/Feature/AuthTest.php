<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class AuthTest extends TestCase
{
    /**
     * Test the auth
     *
     * @return void
     */
    public function testAuth()
    {
        // Create a User
        $user = factory(User::class)->create([
            'name' => 'bobsmith',
            'email' => 'bob@example.com',
            'password' => bcrypt('password')
        ]);
        // Create request
        $data = array(
            'email' => $user->email,
            'password' => 'password',
        );
        $response = $this->call('POST', 'api/authenticate', $data);
        $response->assertStatus(200);
        $content = json_decode($response->getContent());
        $this->assertTrue(array_key_exists('token', $content));
    }
    /**
     * Test the auth when user does not exist
     *
     * @return void
     */
    public function testAuthFailure()
    {
        // Create data for request
        $data = array(
            'email' => 'user@example.com',
            'password' => 'password',
        );
        $response = $this->json('POST', 'api/authenticate', $data);
        // Check the status code
        $response
            ->assertStatus(401);
    }
}
