<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RouteGameTest extends TestCase
{
    public function testRouteIndex()
    {
        $response = $this->get('/games');

        $response->assertStatus(200);
    }

    public function testRouteCreate()
    {
        $response = $this->get('/games/create');

        $response->assertStatus(200);
    }

    public function testRouteEdit()
    {
        $response = $this->get('/games/1/edit');

        $response->assertStatus(200);
    }
}
