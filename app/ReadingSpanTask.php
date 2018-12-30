<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReadingSpanTask extends Model
{
    protected $fillable = [
        'user_id', 'serial', 'iteration', 'word', 'word_answer',
        'word_result', 'sentence_id', 'sentence_answer', 'sentence_result',
        'image_id', 'recall_method'
    ];
}
