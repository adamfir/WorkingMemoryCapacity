<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{
    protected $fillable = [
        'seri', 'iterasi', 'sentences', 'sentence', 'correct_answer'
    ];
}
