<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RouteQuestionTest extends TestCase
{

//Le testing des routes vient interroger la bdd de prod et non celle de test....

    public function testRouteIndex()
    {
        $response = $this->get(route("questions.index"));

        $response->assertStatus(200);
    }

    public function testRouteCreate()
    {
        $response = $this->get(route("questions.create"));

        $response->assertStatus(200);
    }

    public function testRouteEdit()
    {
        $response = $this->get(route('questions.edit', 1));

        $response->assertStatus(200);
    }

    public function testRouteDelete()
    {
        $bdd = mysqli_connect("localhost", "root",  "","quizz" );
        $bdd->query("INSERT INTO questions (question, category, difficulty) VALUES ('test','test','2')");

        $id = $bdd->insert_id;
        $response = $this->delete(route("questions.destroy", $id));

        $response->assertStatus(302);
    }
}
