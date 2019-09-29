<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function webTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

	public function apiTest()
	{
		$response = $this->get('');
	}
}
