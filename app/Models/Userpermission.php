<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Auth\DatabaseUserProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userpermission extends Model
{
    use UUID;
    use HasFactory;
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
    protected $casts = [
        'data' => 'array',
    ];
    public static function empmanage($emp_id, $request)
    {
        $data = Userpermission::where('user_id', $emp_id)->first();
        if (!$data) {
            $data = new Userpermission();
            $data->user_id = $emp_id;
        }
        $xdata = $data->data ?? [];
        $xdata['prodtype'] = (int)($request->prodtype?? 0);
        $xdata['category'] = (int)($request->category ?? 0);
        $xdata['cms'] = (int)($request->cms ?? 0);
        $xdata['seo'] = (int)($request->seo ?? 0);
        $xdata['banner'] = (int)($request->banner ??0);
        $xdata['attribute'] = (int)($request->attribute??0);

        $xdata['prod_add'] = (int)($request->prod_add ??  0);
        $xdata['prod_edit'] = (int)($request->prod_edit ??0);
        $xdata['prod_view'] = (int)($request->prod_view ?? 0);
        $xdata['prod_delete'] = (int)($request->prod_delete ?? 0);

        $xdata['emp_add'] = (int)($request->emp_add ??  0);
        $xdata['emp_edit'] = (int)($request->emp_edit ?? 0);
        $xdata['emp_view'] = (int)($request->emp_view ?? 0);
        $xdata['emp_delete'] = (int)($request->emp_delete ??0);
        $data->data = $xdata ?? [];
        $data->save();
        return $data;
    }
}
