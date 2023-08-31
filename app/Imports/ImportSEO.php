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

class ImportSEO implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    public function model(array $row)
    {
        $data = Master::where('name', 'SEO')->where('name',$row['Name'])->first();
        if (!$data) {
            $datax = [];
            $datax['name'] = $row['Name'] ?? '';
            $datax['title'] = $row['Title'] ?? '';
            $datax['desc'] = $row['Descriptions'] ?? '';
            $data = Master::manage('SEO', $datax);
        }
        return $data;
    }
}
