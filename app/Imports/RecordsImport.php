<?php

namespace App\Imports;

use App\Models\Record;
//use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
/*use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;*/

class RecordsImport //implements ToModel
{
    public function __invoke(Collection $rows): void
    {
        echo "<pre>"; print_r($rows); exit;
        foreach ($rows as $row) {
            /*Contact::create([
                'name'  => $row['name'],
                'email' => $row['email'],
                'phone' => $row['phone'],
            ]);*/
        }
    }
}
