<?php

namespace App\Models;

use App\Exports\Reports\ProductExport;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use UUID;
    use HasFactory;
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships; //But Its Have Worked
    protected $casts = [
        'data' => 'array',
        'seo' => 'array',
        'metadata' => 'array',
    ];
    // ---------------------------Relationships-------------------------//
    public function relproductsub()
    {
        return $this->belongsTo(Product_sub::class, 'id', 'prod_id');
    }
    public function producttype()
    {
        return $this->belongsTo(Master::class, 'metadata->prodtype_id', 'id')->where('status', 1);
    }
    public function category()
    {
        return $this->belongsTo(Master::class, 'metadata->cate_id', 'id')->where('status', 1);
    }
    public static function getdata($filter)
    {
        $data = Products::select('*');
        if ($filter['status'] > -1) {
            $data = $data->where('status', $filter['status']);
        }
        if ($filter['name']) {
            $data = $data->where('data->name', 'LIKE', '%' . $filter['name'] . '%');
        }
        return $data->orderBy($filter['orderby'], $filter['ordertype']);
    }
    // -----------------------------------------Functions------------------------------//
    public static function manage($request, $id = null)
    {
        $data = Products::find($id);
        if (!$data) {
            $data = new Products();
        }
        $data->name = $request->name ?? '';

        $xdata = $data->data ?? [];
        $xdata['slugurl'] = preg_replace('/[^A-Za-z0-9-]+/', '-', ($request->name ?? ''));
        $xdata['spl_name'] = $request->spl_name ?? '';
        $xdata['mom_tree'] = $request->mom_tree ?? '';
        $xdata['seedfrom'] = $request->seedfrom ?? '';
        $xdata['sku'] = $request->sku ?? ''; //stoke keeping unit No
        $data->data = $xdata ?? [];

        $seo = $data->seo ?? [];
        $seo['tntitle'] = $request->tntitle ?? '';
        $seo['entitle'] = $request->entitle ?? '';
        $seo['tndesc'] = $request->tndesc ?? '';
        $seo['endesc'] = $request->endesc ?? '';
        $data->seo = $seo ?? [];

        $metadata = $data->metadata ?? [];
        $metadata['prodtype_id'] = $request->prodtype_id ?? '';
        $metadata['cate_id'] = $request->cate_id ?? '';
        $data->metadata = $metadata ?? [];

        $data->status = $request->status ?? 0;
        $data->save();
        Product_sub::manageprodextra($data->id, $request,$id=null);
        $datax = Products::with('relproductsub')->find($data->id);
        return $datax;
    }
    public static function removedata($id)
    {
        $data = Products::find($id);
        return $data->delete();
    }
}
