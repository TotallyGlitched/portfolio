<?php

namespace App\Models;

use App\Http\Controllers\GeneralController;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use File;

class Master extends Model
{
    use UUID;
    use HasFactory;
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
    protected $casts = [
        'data' => 'array',
    ];
    //   ------------------------Relationships--------------//
    public function prodtype()
    {
        return $this->belongsTo(Master::class, 'data->prodtype_id', 'id');
    }
    public static function activemoduledata($type)
    {
        return Master::where('name', $type)->where('status', 1);
    }
    public static function getdata($modelname, $filter)
    {
        $data = Master::where('name', $modelname);
        if ($filter['status'] > -1) {
            $data = $data->where('status', $filter['status']);
        }
        if ($filter['name']) {
            $data = $data->where('data->name', 'LIKE', '%' . $filter['name'] . '%');
        }
        return $data->orderBy($filter['orderby'], $filter['ordertype']);
    }
    public static function module($type)
    {
        return Master::where('name', $type);
    }
    // --------------functions--------------//

    public static function managecategory($data, $value)
    {
        $data['prodtype_id'] = $value->prodtype_id ?? $value['prodtype_id'] ?? '';
        $data['name'] = $value->name ?? $value['name'] ?? '';
        $data['slugurl'] = preg_replace('/[^A-Za-z0-9-]+/', '-', ($value->name ?? $value['name'] ?? ''));
        $data['desc'] = $value->desc ?? $value['desc'] ?? '';
        if ($value->name ?? '') {
            $filename = 'Category/' . $value->name ?? $value['name'] ?? '';
            $data['image'] = $data['image'] ?? null;
            $data['image'] = GeneralController::storedocuments($value, 'image', $data['image'] ?? null, $filename);
            $data['banner'] = $data['banner'] ?? null;
            $data['banner'] = GeneralController::storedocuments($value, 'banner', $data['banner'] ?? null, $filename);
        }
        return $data;
    }
    public static function manageContactus($data, $value)
    {
        $data['name'] = $value->name ?? $value['name'] ?? '';
        $data['slugurl'] = preg_replace('/[^A-Za-z0-9-]+/', '-', ($value->name ?? $value['name'] ?? ''));
        $data['email'] = $value->email ?? $value['email'] ?? '';
        $data['phno'] = $value->phno ?? $value['phno'] ?? '';
        $data['msg'] = $value->msg ?? $value['msg'] ?? '';
        return $data;
    }
    public static function manageBanner($data, $value)
    {
        $data['name'] = $value->name ?? $value['name'] ?? '';
        $data['slugurl'] = preg_replace('/[^A-Za-z0-9-]+/', '-', ($value->name ?? $value['name'] ?? ''));
        $data['link'] = $value->link ?? $value['link'] ?? '';
        $data['type'] = $value->type ?? $value['type'] ?? '';
        $data['desc'] = $value->desc ?? $value['desc'] ?? '';
        if ($value->name ?? '') {
            $filename = 'Category/' . $value->name ?? '';
            $data['banner'] = $data['banner'] ?? null;
            $data['banner'] = GeneralController::storedocuments($value, 'banner', $data['banner'] ?? null, $filename);
        }
        return $data;
    }
    public static function manageCMS($data, $value)
    {
        $data['name'] = $value->name ?? $value['name'] ?? '';
        $data['slugurl'] = preg_replace('/[^A-Za-z0-9-]+/', '-', ($value->name ?? $value['name'] ?? ''));
        $data['title'] = $value->title ?? $value['title'] ?? '';
        $data['desc'] = $value->desc ?? $value['desc'] ?? '';
        return $data;
    }
    public static function manageSEO($data, $value)
    {
        $data['name'] = $value->name ?? '';
        $data['slugurl'] = preg_replace('/[^A-Za-z0-9-]+/', '-', ($value->name ?? ''));
        $data['title'] = $value->title ?? '';
        $data['desc'] = $value->desc ?? '';
        return $data;
    }
    public static function manage($modelname, $request, $id = null)
    {
        $data = Master::find($id);
        if (!$data) {
            $data = new Master();
            $data->name = $modelname;
        }
        $xdata = $data->data ?? [];
        if ($modelname == in_array($modelname, ['producttype', 'attribute'])) {
            $xdata['name'] = $request->name ?? $request['name'] ?? '';
            $xdata['slugurl'] = preg_replace('/[^A-Za-z0-9-]+/', '-', ($request->name ?? $request['name'] ?? ''));
        } else if ($modelname == 'category') {
            $xdata = Master::managecategory($xdata, $request);
        } else if ($modelname == 'CMS') {
            $xdata = Master::manageCMS($xdata, $request);
        } else if ($modelname == 'SEO') {
            $xdata = Master::manageSEO($xdata, $request);
        } else if ($modelname == 'banner') {
            $xdata = Master::manageBanner($xdata, $request);
        } else if ($modelname == 'contactus') {
            $xdata = Master::manageContactus($xdata, $request);
        }
        $data->data = $xdata ?? [];
        $data->status = $request->status ?? $request['status'] ?? 0;
        $data->save();
        return $data;
    }
    public static function removedata($id)
    {
        $data = Master::find($id);
      if(!$data){
        return ;
      }
      array_key_exists('image', $data->data ?? []) ? File::delete(public_path($data->data['image'])) : null;
      array_key_exists('banner', $data->data ?? []) ? File::delete(public_path($data->data['banner'])) : null;
      $data->delete();
      return 1;
    }
}
