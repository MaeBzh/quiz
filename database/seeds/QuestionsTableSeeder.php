<?php

use Illuminate\Database\Seeder;
use App\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::create([
            'question' => "Quelle est la signification de PHP",
            'category' => "php",
            'difficulty' => 1,
        ]);
        Question::create([
            'question' => "Quelle est la signification de JAVA",
            'category' => "java",
            'difficulty' => 1,
        ]);
        Question::create([
            'question' => "Quelle est la signification de JS",
            'category' => "js",
            'difficulty' => 1,
        ]);
        Question::create([
            'question' => "combien de bytes dans 1 octet",
            'category' => "general",
            'difficulty' => 1,
        ]);
        Question::create([
            'question' => "couleur de 255 255 255",
            'category' => "general",
            'difficulty' => 1,
        ]);
    }
}
