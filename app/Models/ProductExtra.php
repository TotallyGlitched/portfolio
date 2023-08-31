<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Row;

class ProductExtra extends Model
{
    use UUID;
    use HasFactory;
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
    protected $casts = [
        'data' => 'array',
    ];
    public function productcard()
    {
        return $this->belongsTo(Products::class, 'prod_id', 'id')->with('relproductsub');
    }
    public static function manage($request, $uid,$type)
    {
        $prod_id = Products::first()->id; //change
        $data = ProductExtra::where('type', $type)->where('user_id', $uid)->where('prod_id', $prod_id)->first();
        if (!$data) {
            $success = 1;
            $data = new ProductExtra();
            $data->type = $type;
            $data->user_id = $uid;
            $data->prod_id = $prod_id; //change
            $datax = $data->data ?? [];
            $datax['count'] = $request->count ?? 1;
            $title = 'Product Added Successfully';
            $message = 'Product has been Added Successfully';
        } else {
            $success = 0;
            $datax = $data->data ?? [];
            $title = 'Product has been added Successfully';
            $message = 'Product is already in Cart';
        }
        $data->data = $datax ?? [];
        $data->save();
        $x = [];
        $x['success'] = $success ? true : false;
        $x['title'] = $title;
        $x['message'] = $message;
        $x['count'] = ProductExtra::where('type', $type)->where('user_id', $uid)->count();
        return $x;
    }
}
