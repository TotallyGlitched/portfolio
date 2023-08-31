<?php

namespace App\Models;

use App\Models\Misc\VillageUser;
use App\Traits\UUID;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use Laravel\Sanctum\HasApiTokens as SanctumHasApiTokens;

class User extends Authenticatable
{
    use SanctumHasApiTokens, HasFactory, Notifiable;
    use UUID;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'permission' => 'array',
    ];
    // ------------------Relations---------------------------//
    public function relpermissions()
    {
        return $this->belongsTo(Userpermission::class, 'id', 'user_id');
    }
    public static function getdata($filter)
    {
        $data = User::select('*');
        if ($filter['status'] > -1) {
            $data = $data->where('status', $filter['status']);
        }
        if ($filter['name']) {
            $data = $data->where('data->name', 'LIKE', '%' . $filter['name'] . '%');
        }
        return $data->orderBy($filter['orderby'], $filter['ordertype']);
    }
    // ----------------Functions-----------------------//
    public static function empmanage($request, $id = null)
    {
        $data = User::find($id);
        if (!$data) {
            $data = new User();
            $data->type = 3;
        }
        $data->name = $request->name ?? '';
        $data->email = $request->email ?? '';
        $data->password = Hash::make($request->password) ?? '';
        $data->phno = $request->phno ?? '';
        $data->save();
        Userpermission::empmanage($data->id, $request);
        return $data;
    }
    public static function profile($request,$id = null)
    {
        $data = User::find($id);
        if (!$data) {
            $data = new User();
        }
        $data->name = $request->name ?? '';
        $data->email = $request->email ?? '';
        $data->password = Hash::make($request->password ?? '');
        $data->phno = $request->phno ?? '';
        $data->save();
        return $data;
    }
    public static function empremove($id)
    {
        $data = User::find($id);
        return $data->delete();
    }
}
