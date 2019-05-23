<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';

    protected $fillable = [
        'name',
        'is_valid'];

    protected $casts = [
        'isValid' => 'boolean',
    ];

    public function question()
    {
        return $this->hasOne(Question::class);
    }
}
