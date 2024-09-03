<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
