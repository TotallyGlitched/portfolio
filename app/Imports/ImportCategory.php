<?php

namespace App\Imports;

use App\Models\Master;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class ImportCategory implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    public function model(array $row)
    {
        $prodtype = Master::where('name', 'producttype')->where('data->name',$row['ProductType'])->first();
        $data = Master::where('name', 'category');
        if ($prodtype) {
            $data = $data->where('data->prodtype_id', $prodtype->id);
        }
        $data = $data->where('name', $row['Name'])->first();
        if (!$data) {
            $datax = [];
            $datax['name'] = $row['Name'] ?? '';
            $datax['prodtype_id'] = $prodtype->id ?? '';
            $datax['desc'] = $row['Descriptions'] ?? '';
            $datax['status'] = $row['Status'] == 'Y' ? 1 : 0;
            $data = Master::manage('category', $datax);
        }
        return $data;
    }
}
