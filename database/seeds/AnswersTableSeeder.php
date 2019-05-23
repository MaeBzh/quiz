<?php

use Illuminate\Database\Seeder;
use App\Answer;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\Question::all() as $question){
        Answer::create([
            'name' => "A",
            'is_valid' => true,
            'question_id' => $question->id,
        ]);
        Answer::create([
            'name' => "B",
            'is_valid' => false,
            'question_id' => $question->id,
        ]);
        Answer::create([
            'name' => "C",
            'is_valid' => false,
            'question_id' => $question->id,
        ]);
        Answer::create([
            'name' => "D",
            'is_valid' => false,
            'question_id' => $question->id,
        ]);
        }
    }
}
