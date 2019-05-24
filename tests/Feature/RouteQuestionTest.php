<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RouteQuestionTest extends TestCase
{
//Le testing des routes vient interroger la bdd de prod et non celle de test....
//    protected function setUp() :void
//    {
//
//        parent::setUp();
//        $bdd = mysqli_connect("localhost", "root",  "","quizz_test" );
//        $requete = $bdd->query("INSERT INTO questions (question, category, difficulty) VALUES ('test','test','2')");
//
//        $this->id = $bdd->insert_id;
//    }

    public function testRouteIndex()
    {
        $response = $this->get('/questions');

        $response->assertStatus(200);
    }

    public function testRouteCreate()
    {
        $response = $this->get('/questions/create');

        $response->assertStatus(200);
    }

    public function testRouteEdit()
    {
        $response = $this->get('/questions/1/edit');

        $response->assertStatus(200);
    }

    public function testRouteDelete()
    {
        $bdd = mysqli_connect("localhost", "root",  "","quizz" );
        $requete = $bdd->query("INSERT INTO questions (question, category, difficulty) VALUES ('test','test','2')");

        $id = $bdd->insert_id;
        $response = $this->get('/questions/'.$id.'/destroy');

        $response->assertStatus(302);
    }

//    protected function tearDown(): void
//    {
//        parent::tearDown();
//        $bdd = mysqli_connect("localhost", "root",  "","quizz_test" );
//        $requete = $bdd->query("'DELETE FROM questions WHERE id = ''.$this->id'");
//
//    }
}
