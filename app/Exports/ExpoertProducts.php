<?php

namespace App\Exports;

use App\Models\Master;
use App\Models\Products;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExpoertProducts implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Products::with('relproductsub')->get();
    }
    public function map($data): array
    {
        return [
            $data->id ?? '',
            $data->metadata['prodtype_id'] ?? '',
            $data->metadata['cate_id'] ?? '',
            $data->name ?? '',
            $data->data['spl_name'] ?? '',
            $data->data['mom_tree'] ?? '',
            $data->data['seedfrom'] ?? '',
            $data->data['sku'] ?? '',
            $data->relproductsub->data['height'] ?? '',
            $data->relproductsub->data['bg_weight'] ?? '',
            $data->relproductsub->data['age'] ?? '',
            $data->relproductsub->data['location'] ?? '',
            $data->relproductsub->pricing['cost'] ?? '',
            $data->relproductsub->pricing['baseprice'] ?? '',
            $data->relproductsub->pricing['disa'] ?? '',
            $data->relproductsub->pricing['disp'] ?? '',
            $data->relproductsub->pricing['taxa'] ?? '',
            $data->relproductsub->pricing['taxp'] ?? '',
            $data->relproductsub->pricing['final'] ?? '',
            $data->seo['tntitle'] ?? '',
            $data->seo['tndesc'] ?? '',
            $data->seo['entitle'] ?? '',
            $data->seo['endesc'] ?? '',
            $data->status==1 ?'Active': 'Disabled',
        ];
    }
    public function headings(): array
    {
        return [
            'ID',
            'Product Type',
            'Category',
            'Name',
            'Special Name',
            'Mother Tree',
            'Seed Source',
            'SKU',
            'Height',
            'Bag Weight',
            'Age',
            'Location',
            'Cost',
            'Base Price',
            'Discount Amount',
            'Discount % ',
            'Tax Amount',
            'Tax %',
            'Final Amount',
            'Tamil Title',
            'Tamil Descriptions',
            'English Title',
            'English Descriptions',
            'Status',
        ];
    }
}
