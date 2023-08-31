<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use File;

class CategoryController extends Controller
{
    public $meta=[
        'title'=>'Category',
        'modelname'=>'category',
        'url'=>'/master/category',
        'file'=>'Master.Category.',
    ];
    public function index(Request $request){
        $json=[];
        $json['name']=$request->name??'';
        $json['status']=$request->status??-1;
        $json['orderby']=$request->orderby??'created_at';
        $json['ordertype']=$request->ordertype??'desc';
        $json['perPage']=$request->perPage??20;

        $data=Master::getdata($this->meta['modelname'],$json)->paginate($json['perPage']);
        return view($this->meta['file'].'index',[
            'data'=>$data,
            'meta'=>$this->meta,
            'json'=>$json,
        ]);
    }
    public function create(Request $request){
        $options = [];
        $options['prodtype'] = Master::activemoduledata('producttype')->select('id', 'data->name as name')->get();
        return view($this->meta['file'].'manage',[
            'meta'=>$this->meta,
            'options'=>$options,
            'data'=>null
        ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'prodtype_id' => 'required',
            'name' => 'required',
            'desc' => 'required',
            'image'=>'',
            'banner'=>'',
            'status' => 'required',
        ],[
            'prodtype_id.required'=>'Please Select Product type',
            'name.required'=>'Enter Name',
            'desc.required'=>'Enter description',
            'image.mimes' => 'Allowed formats are png,jpg,csv,jpeg',
            'image.max' => 'Size of the file must be less than 2 MB',
            'banner.mimes' => 'Allowed formats are png,jpg,csv,jpeg',
            'banner.max' => 'Size of the file must be less than 2 MB',
            'banner.required'=>'Please upload Banner Image',
            'status.required'=>'Please Select Status',
        ]);
        if ($validator->fails()) {
            return back()->withInput()
            ->withErrors($validator)
            ->withInput();
        }
        $data=Master::manage($this->meta['modelname'],$request);
        return redirect($this->meta['url'])->with('status','Added Successfully');
    }

    public function show(Request $request,$id){
        $data=Master::module($this->meta['modelname'])->with('prodtype')->find($id);
        if(!$data){
            return redirect($this->meta['url'])->with('error','Sorry no such information found');
        }
        return view($this->meta['file'].'view',[
            'data'=>$data,
            'meta'=>$this->meta,
        ]);
    }
    public function edit(Request $request,$id){
        $data = Master::module($this->meta['modelname'])->with('prodtype')->find($id);
        if(!$data){
            return redirect($this->meta['url'])->with('error','Sorry no such information found');
        }
        $options = [];
        $options['prodtype'] = Master::activemoduledata('producttype')->select('id', 'data->name as name')->get();
        return view($this->meta['file'].'manage',[
            'meta'=>$this->meta,
            'options'=>$options,
            'data'=>$data,
        ]);
    }
    public function update (Request $request,$id){
        $validator = Validator::make($request->all(), [
            'prodtype_id' => 'required',
            'name' => 'required',
            'desc' => 'required',
            'image'=>'',
            'banner'=>'',
            'status' => 'required',
        ],[
            'prodtype_id.required'=>'Please Select Product type',
            'name.required'=>'Enter Name',
            'desc.required'=>'Enter description',
            'image.mimes' => 'Allowed formats are png,jpg,csv,jpeg',
            'image.max' => 'Size of the file must be less than 2 MB',
            'banner.mimes' => 'Allowed formats are png,jpg,csv,jpeg',
            'banner.max' => 'Size of the file must be less than 2 MB',
            'banner.required'=>'Please upload Banner Image',
            'status.required'=>'Please Select Status',
        ]);

        if ($validator->fails()) {
            return back()->withInput()
                ->withErrors($validator)
                ->withInput();
        }
        $data=Master::manage($this->meta['modelname'],$request,$id);
        return redirect($this->meta['url'])->with('status','Updated Successfully');
    }
    public function destroy (Request $request,$id){
        $data=Master::removedata($id);
        if(!$data){
            return redirect($this->meta['url'])->with('error','Sorry no such information found');
        }
        return redirect($this->meta['url'])->with($data?'status':'error',$data?'Deleted Succesfully':'Contact Admin');
    }
    // public function search(Request $request){
    //     $data=Master::where(function($q)use($request){
    //         return $q->where('name','like','%'.$request->name.'%')
    //             ->orWhere('data->phno','like','%'.$request->name.'%');
    //     })->get();
    //     return $data;
    // }
}
