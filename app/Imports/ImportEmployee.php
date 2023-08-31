<?php

namespace App\Imports;

use App\Models\Master;
use App\Models\User;
use App\Models\Userpermission;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

HeadingRowFormatter::default('none');

class ImportEmployee implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    public function model(array $row)
    {

        $data = User::where('type', 3)->where('name', $row['Name'])->first();

        if (!$data) {
            $data = new User();
            $data->type=3;
            $data->name = $row['Name'] ?? '';
            $data->email = $row['Email'] ?? '';
            $data->Password = bcrypt($row['Password'] ?? '');
            $data->phno = $row['PhoneNumber'] ?? '';
            $data->save();

            $datax = new Userpermission();
            $datax->user_id = $data->id;
            $permission = $datax->data ?? [];
            $permission['prodtype'] = $row['ProductType'] == 'Y' ? 1 : 0;
            $permission['category'] = $row['Category'] == 'Y' ? 1 : 0;
            $permission['cms'] = $row['CMS'] == 'Y' ? 1 : 0;
            $permission['seo'] = $row['SEO'] == 'Y' ? 1 : 0;
            $permission['banner'] = $row['Banner'] == 'Y' ? 1 : 0;
            $permission['attribute'] = $row['Attribute'] == 'Y' ? 1 : 0;
            $permission['prod_add'] = $row['ProductAdd'] == 'Y' ? 1 : 0;
            $permission['prod_edit'] = $row['ProductEdit'] == 'Y' ? 1 : 0;
            $permission['prod_view'] = $row['ProductView'] == 'Y' ? 1 : 0;
            $permission['prod_delete'] = $row['ProductDelete'] == 'Y' ? 1 : 0;
            $permission['emp_add'] = $row['EmployeeAdd'] == 'Y' ? 1 : 0;
            $permission['emp_edit'] = $row['EmployeeEdit'] == 'Y' ? 1 : 0;
            $permission['emp_view'] = $row['EmployeeView'] == 'Y' ? 1 : 0;
            $permission['emp_delete'] = $row['EmployeeDelete'] == 'Y' ? 1 : 0;
            $datax->data = $permission;
            $datax->save();
            return $data;
        }
        return $data;
    }
}
