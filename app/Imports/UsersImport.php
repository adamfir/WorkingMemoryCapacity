<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name' => $row['name'],
            'ttl' => $row['ttl'],
            'gender' => $row['gender'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']),
            'universitas' => $row['universitas'],
            'jurusan' => $row['jurusan'],
            'fakultas' => $row['fakultas'],
            'semester' => $row['semester'],
            'skor_kecerdasan' => $row['skor_kecerdasan'],
            'skor_ec' => $row['skor_ec'],
            'jumlah_hafalan' => $row['jumlah_hafalan'],
            'lama_menghafal' => $row['lama_menghafal'],
            'role' => $row['role'],
        ]);
    }
}
