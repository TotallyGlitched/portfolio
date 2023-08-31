<?php

namespace App\Models;

use App\Http\Controllers\CustomerGenarelController;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Customer extends Model
{
    use UUID;
    use HasFactory;
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
    protected $casts = [
        'data' => 'array',
    ];

    public static function getdata($modelname, $filter)
    {
        $data = Customer::where('type', $modelname);
        if ($filter['status'] > -1) {
            $data = $data->where('status', $filter['status']);
        }
        if ($filter['name']) {
            $data = $data->where('data->name', 'LIKE', '%' . $filter['name'] . '%');
        }
        return $data->orderBy($filter['orderby'], $filter['ordertype']);
    }

    // ___________________________________Functions___________________________//
    public static function manage($modelname, $request, $id = null)
    {
        $data = Customer::find($id);
        if (!$data) {
            $data = new Customer();
            $data->user_id=$request->user()->id ?? '';
        }
        $xdata = $data->data ?? [];
        if ($modelname == 'address') {
            $data->type = 0;
            $xdata['name'] = $request->name ?? '';
            $xdata['phno'] = $request->phno ?? '';
            $xdata['pincode'] = $request->pincode ?? '';
            $xdata['country'] = $request->country ?? '';
            $xdata['state'] = $request->state ?? '';
            $xdata['city'] = $request->city ?? '';
            $xdata['house_no'] = $request->house_no ?? '';
            $xdata['area_no'] = $request->area_no ?? '';
            $xdata['landmark'] = $request->landmark ?? '';
        }
        $data->data = $xdata ?? [];
        $data->save();
        return $data;
    }
    public static function removedata($id)
    {
        $data = Customer::find($id);
        return $data->delete();
    }
}
