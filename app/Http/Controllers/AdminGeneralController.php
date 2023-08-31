<?php

namespace App\Http\Controllers;

use App\Exports\ExpoertAttribute;
use App\Exports\ExpoertCategory;
use App\Exports\ExpoertCMS;
use App\Exports\ExpoertContactUs;
use App\Exports\ExpoertEmployee;
use App\Exports\ExpoertProducts;
use App\Exports\ExpoertProductType;
use App\Exports\ExpoertSEO;
use App\Imports\ImportAttribute;
use App\Imports\ImportBanner;
use App\Imports\ImportCategory;
use App\Imports\ImportCMS;
use App\Imports\ImportContactUs;
use App\Imports\ImportEmployee;
use App\Imports\ImportProducts;
use App\Imports\ImportProductType;
use App\Imports\ImportSEO;
use App\Models\Sales;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Month;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class AdminGeneralController extends Controller
{
    public function dashboard(Request $request)
    {
        return "WELCOME TO GANESH NURSERY";
    }
    public function userlogin()
    {
        return view('login');
    }

    public function userregister(Request $request)

    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',

        ], [
            'email.required' => 'Please Enter the Email',
            'password.required' => 'Please Enter the  Currect password',
        ]);
        if ($validator->fails()) {
            return back()->withInput()
                ->withErrors($validator)
                ->withInput();
        }
        // $credentials = request(['', 'password']);   //Login Error, Sorry you dont have access'
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/master')->with('status', 'Weclome to ' . env('APP_NAME'));
        }
        return redirect('login');
    }
    public function importexportget()
    {
        return view('importexport');
    }
    public function importexportpost(Request $request, $name)
    {
        $x = null;
        if ($name == 'producttype') {
            $x = new ImportProductType();
        } else if ($name == 'category') {
            $x = new ImportCategory();
        } else if ($name == 'cms') {
            $x = new ImportCMS();
        } else if ($name == 'seo') {
            $x = new ImportSEO();
        }else if ($name == 'contactus') {
            $x = new ImportContactUs();
        }else if ($name == 'attribute') {
            $x = new ImportAttribute();
        }else if ($name == 'employee') {
            $x = new ImportEmployee();
        }else if ($name == 'products') {
            $x = new ImportProducts();
        }
        FacadesExcel::import($x, $request->file('loc'));
        return redirect('/importexport')->with('success', 'Imported Successfully');
    }
    public function importexportfile(Request $request, $name)
    {
        $x = null;
        $filename = null;
        if ($name == 'producttype') {
            $x = new ExpoertProductType();
            $filename = 'producttype';
        }else if ($name == 'category') {
            $x = new ExpoertCategory();
            $filename = 'category';
        }else if ($name == 'cms') {
            $x = new ExpoertCMS();
            $filename = 'cms';
        }else if ($name == 'seo') {
            $x = new ExpoertSEO();
            $filename = 'seo';
        }else if ($name == 'contactus') {
            $x = new ExpoertContactUs();
            $filename = 'contactus';
        }else if ($name == 'attribute') {
            $x = new ExpoertAttribute();
            $filename = 'attribute';
        }else if ($name == 'employee') {
            $x = new ExpoertEmployee();
            $filename = 'employee';
        }else if ($name == 'products') {
            $x = new ExpoertProducts();
            $filename = 'products';
        }
        return FacadesExcel::download($x, $filename . '.xlsx');
    }
}
