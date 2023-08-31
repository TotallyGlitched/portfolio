<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AdminGeneralController;
use App\Http\Controllers\CustomerGenarelController;
use App\Http\Controllers\Master\AttributeController;
use App\Http\Controllers\Master\BannerController;
use App\Http\Controllers\Master\CategoryController;
use App\Http\Controllers\Master\CMSController;
use App\Http\Controllers\Master\ContactUsController;
use App\Http\Controllers\Master\EmployeeController;
use App\Http\Controllers\Master\ProductTypeController;
use App\Http\Controllers\Master\SEOController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Profile\AddressController;
use App\Http\Controllers\Profile\SecurityController;
use App\Http\Controllers\Profile\SettingController;
use App\Http\Controllers\User\CustomersController;
use App\Models\Customer;
use App\Models\Master;
use App\Models\Product_sub;
use App\Models\ProductExtra;
use App\Models\Products;
use App\Models\User;
use App\Models\Userpermission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});