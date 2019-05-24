<?php

namespace Tests\Feature;

use App\Http\Middleware\VerifyCsrfToken;
use App\Question;
use Tests\TestCase;

class AnswerTest extends TestCase
{
    
    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware([VerifyCsrfToken::class]);
    }

    public function testCreateNewAnswer()
    {

        $data = ["name" => "Nooooooooooon", "is_valid" => 1, "question_id" => 1];
        $this->post(route("questions.answers.store", $data));
        $this->assertDatabaseHas("answers", $data);
    }

    protected function tearDown(): void
    {
        parent::tearDown(); // TODO: Change the autogenerated stub
    }

}
