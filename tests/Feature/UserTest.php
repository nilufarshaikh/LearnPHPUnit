<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     */
    public function test_if_user_with_specific_email_in_database(): void
    {
        $response = $this->post('/api/register');
        $response = DB::table('users')->where('email', '=', 'roger@example.com')->first();

        $email = UserService::extract_email($response);

        $this->assertEquals('roger@example.com', $email);
    }
}
