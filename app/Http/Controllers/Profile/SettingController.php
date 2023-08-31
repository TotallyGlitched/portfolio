<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function loginprofile(Request $request)
    {
        $data=User::find($request->user()->id);
        return $data;
    }
    public  function profilestore(Request $request)
    {
        $data = User::profile($request);
        return redirect('/profile/information')->with('success','Details Updated');
    }
}
