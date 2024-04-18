<?php

namespace Tests\Integration;

use GuzzleHttp\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * A basic integration test example.
     *
     * @test
     */
    public function check_if_getting_data_from_api_endpoint(): void
    {
        $httpClient = new Client();
        $response = $httpClient->get('https://jsonplaceholder.typicode.com/posts');

        $this->assertEquals(100, count(json_decode($response->getBody()->getContents(), true)));
    }

    /**
     * A basic integration test for mockery example.
     */
    public function test_mockery_example()
    {
        // Mock the Http facade using Mockery
        $httpMock = Mockery::mock('alias:' . \Illuminate\Support\Facades\Http::class);

        // Set up expectations for the get method
        $httpMock->shouldReceive('get')
            ->once()
            ->with('https://jsonplaceholder.typicode.com/todos/1')
            ->andReturn([
                "userId" => 1,
                "id" => 2,
                "title" => "Data from Mockery",
                "completed" => false,
            ]);

            $response = $httpMock->get('https://jsonplaceholder.typicode.com/todos/1');

            $this->assertGreaterThan(3, count($response));
    }
}
