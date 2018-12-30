<?php

namespace App\Imports;

use App\Sentence;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;


class SentencesImport implements ToCollection, WithHeadingRow
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
            Sentence::create([
                'seri' => $row['seri'],
                'iterasi' => $row['iterasi'],
                'sentence' => $row['sentence'],
                'sentences' => $row['sentences'],
                'correct_answer' => $row['correct_answer']
            ]);
        }
    }
}
