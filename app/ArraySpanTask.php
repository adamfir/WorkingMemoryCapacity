<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArraySpanTask extends Model
{
    //
    protected $fillable = [
        'pertanyaan', 'user_id', 'seri', 'iterasi'
    ];
}
