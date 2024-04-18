<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    public function test_check_if_user_getting_created()
    {
        User::factory(10)->create();
        $response = DB::table('users')->get()->toArray();

        // $this->assertArrayHasKey(9, $response);

        $this->assertCount(10, $response);
    }

    public function test_if_user_is_present_in_database()
    {
        User::factory(1)->create(['name' => 'Roger']);
        User::factory(9)->create();

        $response = DB::table('users')->get();

        $this->assertEquals(10, count($response));

        $this->assertTrue($response->contains(function($item) {
            return $item->name == "Roger";
        }));

        $this->assertObjectHasProperty("name", $response[0]);
    }
}
