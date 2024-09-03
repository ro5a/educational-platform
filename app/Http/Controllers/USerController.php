<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class USerController extends Controller
{
    public function index()
    {
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $user = isset($_GET['Id']) ? $user = User::where('id', $_GET['Id'])->first() : 'all';
        $users = User::get();
        return view('dashboard', [
            'users' =>  $users,
            'user'  =>  $user,
            'do'    =>  $do,
        ]);
    }
    public function add(UserRequest $request)
    {
        $request->validated();


        try {
            $user =  User::create([
                'name'          => $request->name,
                'email'         =>  $request->email,
                'phone'         => $request->phone,
                'password'      =>  Hash::make($request->password),
                'remember_token' =>  Str::uuid(),
            ]);

            return to_route('dashboard')->with([
                'success'   =>'تمت الاضافة بنجاح',
            ]);
        } catch (\Exception) {
            return to_route('dashboard')->with([
                'error'     => 'حدث خطاء في الاضافة',
            ]);
        }
    }

    public function update(UserRequest $request, $id)
    {
        $request->validated();


        try {
            $user = User::find($id);

            $user->update([
                'name'          => $request->name,
                'phone'         =>  $request->phone,
                'password'      =>  Hash::make($request->password),
                'remember_token' =>  Str::uuid(),
            ]);

            return redirect()->route('dashboard')->with([
                'success'   =>'تم تعديل المستخدم',
            ]);
        } catch (\Exception) {
            return redirect()->route('dashboard')->with([
                'error'   => 'حدث خطاء في التعديل',
            ]);
        }
    }



    public function delete($id)
    {
        try {

            $user = User::find($id);

            $user->delete();
            if ($user->delete())
                return redirect()->route('dashboard')->with([
                    'success'   => 'تم حذف المستخدم',
                ]);
        } catch (\Exception) {
            return redirect()->route('dashboard')->with([
                'error'   => 'حدث خطاء في الحذف',
            ]);
        }
    }
}
