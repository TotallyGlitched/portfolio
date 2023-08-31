<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master;
use App\Models\User;
use App\Models\Userpermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public $meta = [
        'title' => 'Employee',
        'modelname' => 'employee',
        'url' => '/master/employee',
        'file' => 'Master.Employee.',
    ];
    public function index(Request $request)
    {
        $json = [];
        $json['name'] = $request->name ?? '';
        $json['status'] = null;
        $json['orderby'] = $request->orderby ?? 'created_at';
        $json['ordertype'] = $request->ordertype ?? 'desc';
        $json['perPage'] = $request->perPage ?? 20;
        $data = User::getdata($json)->whereNotIn('type', [1, 2])->paginate($json['perPage']);
        return view($this->meta['file'] . 'index', [
            'data' => $data,
            'meta' => $this->meta,
            'json' => $json,
        ]);
    }
    public function create(Request $request)
    {
        $options = [];
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
            'email' => 'required',
            'password' => 'required',
            'phno' => 'required',
        ], [
            'name.required' => 'Enter Name',
            'email.required' => 'Enter Email',
            'password.required' => 'Enter Password',
            'phno.required' => 'Enter phno',

        ]);
        if ($validator->fails()) {
            return back()->withInput()
                ->withErrors($validator)
                ->withInput();
        }
        $data = User::empmanage($request);
        return redirect($this->meta['url'])->with('status', 'Added Successfully');
    }

    public function show(Request $request, $id)
    {
        $data = User::find($id);
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
        $data = User::find($id);
        if (!$data) {
            return redirect($this->meta['url'])->with('error', 'Sorry no such information found');
        }
        $options = [];
        $options = Userpermission::where('user_id', $data->id)->first();
        return view($this->meta['file'] . 'manage', [
            'data' => $data,
            'meta' => $this->meta,
            'options' => $options,
        ]);
        return $data;
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phno' => 'required',
        ], [
            'name.required' => 'Enter Name',
            'email.required' => 'Enter Email',
            'phno.required' => 'Enter Phone Number',
        ]);

        if ($validator->fails()) {
            return back()->withInput()
                ->withErrors($validator)
                ->withInput();
        }
        $data = User::empmanage($request, $id);
        return redirect($this->meta['url'])->with('status', 'Updated Successfully');
    }
    public function destroy(Request $request, $id)
    {
        $data = User::empremove($id);
        if ($data) {
            Userpermission::where('user_id', $id)->delete();
        }
        if (!$data) {
            return redirect($this->meta['url'])->with('error', 'Sorry no such information found');
        }
        return redirect($this->meta['url'])->with($data ? 'status' : 'error', $data ? 'Deleted Succesfully' : 'Contact Admin');
    }
    // public function search(Request $request){
    //     $data=Master::where(function($q)use($request){
    //         return $q->where('name','like','%'.$request->name.'%')
    //             ->orWhere('data->phno','like','%'.$request->name.'%');
    //     })->get();
    //     return $data;
    // }
}
