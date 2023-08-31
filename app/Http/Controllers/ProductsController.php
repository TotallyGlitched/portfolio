<?php

namespace App\Http\Controllers;

use App\Models\Master;
use App\Models\Product_sub;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public $meta = [
        'title' => 'Products',
        'url' => '/products',
        'file' => 'Products.',
    ];
    public function index(Request $request)
    {
        $json = [];
        $json['name'] = $request->name ?? '';
        $json['status'] = $request->status ?? -1;
        $json['orderby'] = $request->orderby ?? 'created_at';
        $json['ordertype'] = $request->ordertype ?? 'desc';
        $json['perPage'] = $request->perPage ?? 20;
        $data = Products::getdata($json)->with('relproductsub')->paginate($json['perPage']);
        // return $data;
        return view($this->meta['file'] . 'index', [
            'data' => $data,
            'meta' => $this->meta,
            'json' => $json,
        ]);
    }
    public function create(Request $request)
    {
        $options = [];
        $options['prodtype'] = Master::activemoduledata('producttype')->select('id', 'data->name as name')->get();
        $options['category'] = Master::activemoduledata('category')->select('id', 'data->name as name')->get();

        return view($this->meta['file'] . 'manage', [
            'meta' => $this->meta,
            'options' => $options,
            'data' => null
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'spl_name' => 'required',
            'mom_tree' => 'required',
            'seedfrom' => 'required',
            'sku' => 'required',
            'height' => 'required',
            'bg_weight' => 'required',
            'age' => 'required',
            'location' => 'required',
            'cost' => 'required',
            'baseprice' => 'required',
            'disa' => 'required',
            'disp' => 'required',
            'taxa' => 'required',
            'taxp' => 'required',
            'final' => 'required',
            'tntitle' => 'required',
            'tndesc' => 'required',
            'entitle' => 'required',
            'endesc' => 'required',
            'prodtype_id' => 'required',
            'cate_id' => 'required',
            'status' => 'required',
            'loc' => '',
        ], [
            'name.required' => 'Enter Name',
            'spl_name.required' => 'Enter Special Name',
            'mom_tree.required' => 'Enter Mother Tree Name',
            'seedfrom.required' => 'Enter Seed Source',
            'sku.required' => 'Enter SKU Number',
            'height.required' => 'Enter Height',
            'bg_weight.required' => 'Enter Bag Weight',
            'age.required' => 'Enter Age',
            'location.required' => 'Enter Location',
            'cost.required' => 'Enter Cost',
            'baseprice.required' => 'Enter Base Price',
            'disa.required' => 'Enter Discount Amount',
            'disp.required' => 'Enter Discount %',
            'taxa.required' => 'Enter Tax Amount',
            'taxp.required' => 'Enter Tax %',
            'final.required' => 'Enter Final Amount',
            'tntitle.required' => 'Enter Desscription For Tamil',
            'tndesc.required' => 'Enter Desscription For Tamil',
            'English.required' => 'Enter Desscription For English',
            'endesc.required' => 'Enter Desscription For English',
            'prodtype_id.required' => 'Please Select Product type',
            'cate_id.required' => 'Please Select Category',
            'status.required' => 'please Select Status',
            'loc.mimes' => 'Allowed formats are png,jpg,csv,jpeg',
            'loc.max' => 'Size of the file must be less than 2 MB',
        ]);
        if ($validator->fails()) {
            return back()->withInput()
                ->withErrors($validator)
                ->withInput();
        }
        $data = Products::manage($request);
        // return $data;
        return redirect($this->meta['url'])->with('status', 'Added Successfully');
    }
    public function show(Request $request, $id)
    {
        $data = Products::with('relproductsub')->find($id);
        if (!$data) {
            return redirect($this->meta['url'])->with('error', 'Sorry no such information found');
        }
        return view($this->meta['file'] . 'view', [
            'data' => $data,
            'meta' => $this->meta,
        ]);
    }
    public function edit(Request $request, $id)
    {
        $options = [];
        $options['prodtype'] = Master::activemoduledata('producttype')->select('id', 'data->name as name')->get();
        $options['category'] = Master::activemoduledata('category')->select('id', 'data->name as name')->get();
        $data = Products::with('relproductsub')->find($id);
        if (!$data) {
            return redirect($this->meta['url'])->with('error', 'Sorry no such information found');
        }
        return view($this->meta['file'] . 'manage', [
            'data' => $data,
            'meta' => $this->meta,
            'options' => $options,
        ]);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'spl_name' => 'required',
            'mom_tree' => 'required',
            'seedfrom' => 'required',
            'sku' => 'required',
            'height' => 'required',
            'bg_weight' => 'required',
            'age' => 'required',
            'location' => 'required',
            'cost' => 'required',
            'baseprice' => 'required',
            'disa' => 'required',
            'disp' => 'required',
            'taxa' => 'required',
            'taxp' => 'required',
            'final' => 'required',
            'tntitle' => 'required',
            'tndesc' => 'required',
            'entitle' => 'required',
            'endesc' => 'required',
            'prodtype_id' => 'required',
            'cate_id' => 'required',
            'status' => 'required',
            'loc' => '',
        ], [
            'name.required' => 'Enter Name',
            'spl_name.required' => 'Enter Special Name',
            'mom_tree.required' => 'Enter Mother Tree Name',
            'seedfrom.required' => 'Enter Seed Source',
            'sku.required' => 'Enter SKU Number',
            'height.required' => 'Enter Height',
            'bg_weight.required' => 'Enter Bag Weight',
            'age.required' => 'Enter Age',
            'location.required' => 'Enter Location',
            'cost.required' => 'Enter Cost',
            'baseprice.required' => 'Enter Base Price',
            'disa.required' => 'Enter Discount Amount',
            'disp.required' => 'Enter Discount %',
            'taxa.required' => 'Enter Tax Amount',
            'taxp.required' => 'Enter Tax %',
            'final.required' => 'Enter Final Amount',
            'tntitle.required' => 'Enter Desscription For Tamil',
            'tndesc.required' => 'Enter Desscription For Tamil',
            'English.required' => 'Enter Desscription For English',
            'endesc.required' => 'Enter Desscription For English',
            'prodtype_id.required' => 'Please Select Product type',
            'cate_id.required' => 'Please Select Category',
            'status.required' => 'please Select Status',
            'loc.mimes' => 'Allowed formats are png,jpg,csv,jpeg',
            'loc.max' => 'Size of the file must be less than 2 MB',
        ]);
        if ($validator->fails()) {
            return back()->withInput()
                ->withErrors($validator)
                ->withInput();
        }
        $data = Products::manage($request, $id);
        return redirect($this->meta['url'])->with('status', 'Updated Successfully');
    }
    public function destroy(Request $request, $id)
    {
        $data = Products::removedata($id);
        if ($data) {
            Product_sub::where('prod_id', $id)->delete();
        }
        if (!$data) {
            return redirect($this->meta['url'])->with('error', 'Sorry no such information found');
        }
        return redirect($this->meta['url'])->with($data ? 'status' : 'error', $data ? 'Deleted Succesfully' : 'Contact Admin');
    }
    // public function search(Request $request){
    //     $data=Products::where(function($q)use($request){
    //         return $q->where('name','like','%'.$request->name.'%')
    //             ->orWhere('data->phno','like','%'.$request->name.'%');
    //     })->get();
    //     return $data;
    // }
}
