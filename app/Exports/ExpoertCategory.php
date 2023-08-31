<?php

namespace App\Exports;

use App\Models\Master;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExpoertCategory implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Master::where('name', 'category')->with('prodtype')->get();
    }
    public function map($data): array
    {
        return [
            $data->id ?? '',
            $data->prodtype->data['name'] ?? '',
            $data->data['name'] ?? '',
            $data->status == 1 ? 'Active' : 'Disabled',
        ];
    }
    public function headings(): array
    {
        return [
            'ID',
            'Product Type',
            'Name',
            'Status',
        ];
    }
}
