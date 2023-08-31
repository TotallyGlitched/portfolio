<?php

namespace App\Exports;

use App\Models\Master;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExpoertEmployee implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return User::where('type',3)->with('relpermissions')->get();
    }
    public function map($data): array
    {
        return [
            $data->id ?? '',
            $data->name ?? '',
            $data->email ?? '',
            $data->phno ?? '',
            $data->relpermissions->data['prodtype'] ==1 ?'Permit' :'Not Permit',
            $data->relpermissions->data['category'] ==1 ?'Permit' :'Not Permit',
            $data->relpermissions->data['cms'] ==1 ?'Permit' :'Not Permit',
            $data->relpermissions->data['seo'] ==1 ?'Permit' :'Not Permit',
            $data->relpermissions->data['banner'] ==1 ?'Permit' :'Not Permit',
            $data->relpermissions->data['attribute'] ==1 ?'Permit' :'Not Permit',
            $data->relpermissions->data['prod_add'] ==1 ?'Permit' :'Not Permit',
            $data->relpermissions->data['prod_edit'] ==1 ?'Permit' :'Not Permit',
            $data->relpermissions->data['prod_view'] ==1 ?'Permit' :'Not Permit',
            $data->relpermissions->data['prod_delete'] ==1 ?'Permit' :'Not Permit',
            $data->relpermissions->data['emp_add'] ==1 ?'Permit' :'Not Permit',
            $data->relpermissions->data['emp_edit'] ==1 ?'Permit' :'Not Permit',
            $data->relpermissions->data['emp_view'] ==1 ?'Permit' :'Not Permit',
            $data->relpermissions->data['emp_delete'] ==1 ?'Permit' :'Not Permit',
        ];
    }
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Phone Number',
            'Product Type',
            'Category',
            'CMS',
            'SEO',
            'Banner',
            'Attribute',
            'Product Add',
            'Product Edit',
            'Product View',
            'Product Delete',
            'Employee Add',
            'Employee Edit',
            'Employee View',
            'Employee Delete',
        ];
    }
}
