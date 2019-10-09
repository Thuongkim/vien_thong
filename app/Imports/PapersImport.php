<?php

namespace App\Import;

use App\Paper;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class PapersImport implements ToModel, WithChunkReading, ToCollection
{
    public function model(array $row)
    {
        return new Paper([
            'supplier'  => $row[0],
            'catalog'   => $row[1],
            'name'      => $row[2],
            'code'      => $row[3],
            'code_equivalent'   =>  $row[4],
        ]);
    }

    public function collection(Collection $collection)
    {
        return $collection->transform(function ($row) {
            return Paper::make([
                'supplier'  => $row[0],
                'catalog'   => $row[1],
                'name'      => $row[2],
                'code'      => $row[3],
                'code_equivalent' =>  $row[4],
            ]);
        });
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
