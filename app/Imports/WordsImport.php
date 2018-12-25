<?php

namespace App\Imports;

use App\Word;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;


class WordsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            if($row['kongkret'] != null){
                Word::create([
                    'word' => $row['kongkret'],
                    'type' => 'kongkret'
                ]);
            }
            if($row['abstrak'] != null){
                Word::create([
                    'word' => $row['abstrak'],
                    'type' => 'abstrak'
                ]);
            }
            
        }
    }
}
