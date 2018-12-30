<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'ttl', 'gender', 'universitas', 'jurusan', 'fakultas',
        'semester', 'skor_kecerdasan', 'skor_ec', 'jumlah_hafalan', 'lama_menghafal', 'serial',
        'iteration', 'role', 'reading_stack'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
