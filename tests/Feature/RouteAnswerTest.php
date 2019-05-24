<?php

namespace Tests\Feature;

use App\Answer;
use App\Question;
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
        $question = Question::create(['question' => 'test', 'category' => 'test', 'difficulty' => 5]);
        $url = route("questions.answers.index", $question);
        $response = $this->get($url);
        $response->assertStatus(200);
    }

    public function testRouteCreate()
    {
        $question = Question::create(['question' => 'test', 'category' => 'test', 'difficulty' => 5]);
        $response = $this->get(route("questions.answers.create", $question));

        $response->assertStatus(200);
    }

    public function testRouteEdit()
    {
        $question = Question::create(['question' => 'test', 'category' => 'test', 'difficulty' => 5]);
        $answer = Answer::create(['name' => 'test', 'is_valid' => 1]);
        $response = $this->put(route("questions.answers.edit", $question, $answer));

        $response->assertStatus(200);
    }

    public function testRouteDelete()
    {
        $bdd = mysqli_connect("localhost", "root",  "","quizz" );
        $bdd->query("INSERT INTO answers (name, is_valid, question_id) VALUES ('test','1','2')");

        $this->id = $bdd->insert_id;
        $response = $this->delete("questions.answers.destroy", [2, $this->id]);

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
