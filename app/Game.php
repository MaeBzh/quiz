<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games';

    protected $fillable = [
        'player1_points',
        'player2_points'
    ];

    public function userQuestions()
    {
        return $this->hasMany(GameUserQuestion::class);
    }

    public function playerOne()
    {
        return $this->belongsTo(User::class, 'player1_id');
    }

    public function playerTwo()
    {
        return $this->belongsTo(User::class, 'player2_id');
    }

    protected function questions()
    {
        return $this->hasManyThrough(Question::class, GameUserQuestion::class);
    }

    public function playerOneQuestions()
    {
        return $this->userQuestions()->where('user_id', $this->player1_id);
    }

    public function playerTwoQuestions()
    {
        return $this->userQuestions()->where('user_id', $this->player2_id);
    }

    public function isEndGame(){
        $player_one_questions_done = $this->playerOneQuestions()->has('answer')->count();
        $player_two_questions_done = $this->playerTwoQuestions()->has('answer')->count();
        return $this->userQuestions()->count() == $player_one_questions_done + $player_two_questions_done;
    }

    public function getNextQuestion()
    {
        if($this->isEndGame()){
            return null;
        }

        $player_one_questions_done = $this->playerOneQuestions()->has('answer')->count();
        $player_two_questions_done = $this->playerTwoQuestions()->has('answer')->count();
        if($player_one_questions_done > $player_two_questions_done){
            return $this->playerTwoQuestions()->doesntHave('answer')->first();
        } else {
            return $this->playerOneQuestions()->doesntHave('answer')->first();
        }
    }

    public function getWinner(){
        if(! $this->isEndGame() || $this->player1_points === $this->player2_points){
            return null;
        } elseif ( $this->player1_points > $this->player2_points){
            return $this->playerOne;
        } else {
            return $this->playerTwo;
        }
    }
}
