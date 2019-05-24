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
        Answer::create([
            'name' => "A : PHP Hypertext Preprocessor",
            'is_valid' => true,
            'question_id' => 1,
        ]);
        Answer::create([
            'name' => "B : PHP Hypertext processor",
            'is_valid' => false,
            'question_id' => 1,
        ]);
        Answer::create([
            'name' => "C : PHP Html Preprocessor",
            'is_valid' => false,
            'question_id' => 1,
        ]);
        Answer::create([
            'name' => "D : Pre Hypertext processor",
            'is_valid' => false,
            'question_id' => 1,
        ]);
        Answer::create([
            'name' => "A : JAVAMINE",
            'is_valid' => false,
            'question_id' => 2,
        ]);
        Answer::create([
            'name' => "B : JAVA",
            'is_valid' => true,
            'question_id' => 2,
        ]);
        Answer::create([
            'name' => "C : JAVABIEN",
            'is_valid' => false,
            'question_id' => 2,
        ]);
        Answer::create([
            'name' => "D : Java Application Via Access",
            'is_valid' => false,
            'question_id' => 2,
        ]);
        Answer::create([
            'name' => "A : JScript",
            'is_valid' => false,
            'question_id' => 3,
        ]);
        Answer::create([
            'name' => "B : Java Script",
            'is_valid' => false,
            'question_id' => 3,
        ]);
        Answer::create([
            'name' => "C : JavaScript",
            'is_valid' => true,
            'question_id' => 3,
        ]);
        Answer::create([
            'name' => "D : Json Script",
            'is_valid' => false,
            'question_id' => 3,
        ]);
        Answer::create([
            'name' => "A : 8",
            'is_valid' => true,
            'question_id' => 4,
        ]);
        Answer::create([
            'name' => "B : 0",
            'is_valid' => false,
            'question_id' => 4,
        ]);
        Answer::create([
            'name' => "C : 1",
            'is_valid' => false,
            'question_id' => 4,
        ]);
        Answer::create([
            'name' => "D : 1024",
            'is_valid' => false,
            'question_id' => 4,
        ]);
        Answer::create([
            'name' => "A : gris",
            'is_valid' => false,
            'question_id' => 5,
        ]);
        Answer::create([
            'name' => "B : noire",
            'is_valid' => false,
            'question_id' => 5,
        ]);
        Answer::create([
            'name' => "C : aucune réponse",
            'is_valid' => false,
            'question_id' => 5,
        ]);
        Answer::create([
            'name' => "D : blanc",
            'is_valid' => true,
            'question_id' => 5,
        ]);
    }
}
