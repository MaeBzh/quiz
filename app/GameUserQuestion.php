<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameUserQuestion extends Model
{
    protected $table = 'game_user_questions';

    protected $fillable = [];

    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function game(){
        return $this->belongsTo(Game::class);
    }

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function answer(){
        return $this->belongsTo(Answer::class);
    }
}
