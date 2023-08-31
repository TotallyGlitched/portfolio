<?php

namespace App\Models;

use App\Http\Controllers\GeneralController;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_sub extends Model
{
    use UUID;
    use HasFactory;
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
    protected $casts = [
        'data' => 'array',
        'pricing' => 'array',
    ];
    public static function manageprodextra($prod_id, $request, $id = null)
    {
        $data = Product_sub::find($id);
         if (!$data) {
            $data = new Product_sub();
            $data->prod_id =$prod_id ?? '';
         }
        $xdata = $data->data ?? [];
        $xdata['height'] = $request->height ?? '';
        $xdata['bg_weight'] = $request->bg_weight ?? '';
        $xdata['age'] = $request->age ?? '';
        $xdata['location'] = $request->location ?? '';
        $data->data = $xdata ?? [];

        $pricing = $data->pricing ?? [];
        $pricing['cost'] = $request->cost ?? 0;
        $pricing['baseprice'] = $request->baseprice ?? 0;
        $pricing['disa'] = $request->disa ?? 0;
        $pricing['disp'] = $request->disp ?? 0;
        $pricing['taxa'] = $request->taxa ?? 0;
        $pricing['taxp'] = $request->taxp ?? 0;
        $pricing['final'] = $request->final ?? 0;
        $data->pricing = $pricing ?? [];

        $filename = 'products/' . $request->name;
        $data['loc'] = $data['loc'] ?? null;
        $data['loc'] = GeneralController::storedocuments($request, 'loc', $data->loc ?? null, $filename);
        $data->save();
        return $data;
    }
}
