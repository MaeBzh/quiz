<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RouteAnswerTest extends TestCase
{
    private $id;
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
        $response = $this->get('/answers/index');

        $response->assertStatus(200);
    }

    public function testRouteCreate()
    {
        $response = $this->get('/answers/create');

        $response->assertStatus(200);
    }

    public function testRouteEdit()
    {
        $response = $this->get('/answers/edit/1');

        $response->assertStatus(200);
    }

    public function testRouteDelete()
    {
        $bdd = mysqli_connect("localhost", "root",  "","quizz" );
        $requete = $bdd->query("INSERT INTO answers (name, is_valid, question_id) VALUES ('test','1','2')");

        $this->id = $bdd->insert_id;
        $response = $this->get('/answers/destroy/'.$this->id);

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