<?php

namespace App\Exports;

use App\Models\Master;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExpoertContactUs implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Master::where('name', 'contactus')->get();
    }
    public function map($data): array
    {
        return [
            $data->id ?? '',
            $data->data['name'] ?? '',
            $data->data['email'] ?? '',
            $data->data['phno'] ?? '',
            $data->data['msg'] ?? '',
            $data->status == 1 ? 'Active' : 'Disabled',
        ];
    }
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Phone Number',
            'Message',
            'Status',
        ];
    }
}
