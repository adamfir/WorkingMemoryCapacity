<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmotionalQuestionAnswer extends Model
{
    protected $fillable = [
        'user_id', 'emotional_question_id', 'answer'
    ];
}
