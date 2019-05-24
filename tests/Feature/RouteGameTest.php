<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RouteGameTest extends TestCase
{
    public function testRouteIndex()
    {
        $response = $this->get(route("games.index"));

        $response->assertStatus(200);
    }

    public function testRouteCreate()
    {
        $response = $this->get(route("games.create"));

        $response->assertStatus(200);
    }

    public function testRouteEdit()
    {
        $response = $this->get(route("games.edit", 1));

        $response->assertStatus(200);
    }
}
