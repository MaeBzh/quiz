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
        $data = ["name" => "Nooooooooooon", "is_valid" => 1];
        $question = Question::create(['question' => 'test', 'category' => 'test', 'difficulty' => 5]);
        $this->post(route("questions.answers.store", $question), $data);
        $this->assertDatabaseHas("answers", $data);
    }

    protected function tearDown(): void
    {
        parent::tearDown(); // TODO: Change the autogenerated stub
    }

}
