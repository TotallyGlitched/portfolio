<?php

namespace App\Imports;

use App\Models\Master;
use App\Models\Product_sub;
use App\Models\Products;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class ImportProducts implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    public function model(array $row)
    {
        $prodtype = null;
        $category = null;
        $prodtype = master::where('name', 'producttype')->where('data->name', $row['ProductType'])->first();
        if ($prodtype) {
            $category = Master::where('name','category')->where('data->prodtype_id',$prodtype->id)->where('data->name',$row['Category'])->first();
        }
        $data = Products::orderBy('created_at', 'desc');
          $data = $data->where('name', $row['Name'])->first();
        if (!$data) {
            $data = new Products();
            $data->name = $row['Name'] ?? '';

            $datax = $data->data ?? [];
            $datax['slugurl'] = $row['Name'] ?? '';
            $datax['spl_name'] = $row['SpecialName'] ?? '';
            $datax['mom_tree'] = $row['MotherThree'] ?? '';
            $datax['seedfrom'] = $row['SeedFrom'] ?? '';
            $datax['sku'] = $row['SKU'] ?? '';
            $data->data = $datax ?? [];

            $seo = $data->seo ?? [];
            $seo['tntitle'] = $row['TamilTitle'] ?? '';
            $seo['tndesc'] = $row['TamilDescription'] ?? '';
            $seo['entitle'] = $row['EnglishTitle'] ?? '';
            $seo['endesc'] = $row['EnglishDescription'] ?? '';
            $data->seo = $seo ?? [];

            $metadata = $data->metadata ?? [];
            $metadata['prodtype_id'] = $prodtype->id ?? '';
            $metadata['cate_id'] = $category->id ?? '';
            $data->metadata = $metadata ?? [];
            $data->status = $row['Status'] == 'Y' ? 1 : 0;
            $data->save();

$sub=new Product_sub();
$sub->prod_id=$data->id;
$xdata = $data->data ?? [];
$xdata['height'] =$row['Height'] ?? '';
$xdata['bg_weight'] = $row['Bag Weight'] ?? '';
$xdata['age'] = $row['Age'] ?? '';
$xdata['location'] =$row['Location'] ?? '';
$sub->data = $xdata ?? [];

$pricing = $sub->pricing ?? [];
$pricing['cost'] = $row['Cost per Item'] ?? '';
$pricing['baseprice'] =$row['Base Price'] ?? '';
$pricing['disa'] =$row['Discount Amount'] ?? '';
$pricing['disp'] = $row['Discount Percent'] ?? '';
$pricing['taxa'] =$row['Tax Amount'] ?? '';
$pricing['taxp'] =$row['Tax Percent'] ?? '';
$pricing['final'] = $row['Final Amount'] ?? '';
$sub->pricing = $pricing ?? [];

$sub->save();
            return $data;
        }
        return $data;
    }
}
