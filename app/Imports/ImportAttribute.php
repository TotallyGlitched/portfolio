<?php

namespace App\Imports;

use App\Models\Master;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

HeadingRowFormatter::default('none');

class ImportAttribute implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    public function model(array $row)
    {
        $data = Master::where('name', 'attribute')->where('name',$row['Name'])->first();
        if (!$data) {
            $datax = [];
            $datax['name'] = $row['Name'] ?? '';
            $data = Master::manage('attribute', $datax);
        }
        return $data;
    }
}
