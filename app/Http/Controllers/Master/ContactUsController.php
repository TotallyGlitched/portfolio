<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    public $meta=[
        'title'=>'Contact Us',
        'modelname'=>'contactus',
        'url'=>'/master/contact',
        'file'=>'Master.ContactUs.',
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
        $options=[];
        return view($this->meta['file'].'manage',[
            'meta'=>$this->meta,
            'options'=>$options,
            'data'=>null
        ]);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phno' => 'required',
            'msg' => 'required',

        ],[
            'name.required'=>'Enter Name',
            'email.required'=>'Enter Email',
            'phno.required'=>'Enter Phone Number',
            'msg.required'=>'Enter Message',

        ]);
        if ($validator->fails()) {
            return back()->withInput()
            ->withErrors($validator)
            ->withInput();
        }
        $data=Master::manage($this->meta['modelname'],$request);
        return redirect($this->meta['url'])->with('status','Added Successfully');
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
