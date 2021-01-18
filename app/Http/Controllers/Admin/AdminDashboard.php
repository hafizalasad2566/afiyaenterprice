<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    public function getDashboard(){
        $count['userCount'] = User::count();
        return view('admin.dashboard',compact('count'));
    }
    public function userCreateShow(){
        return view('admin.user-create');
    }
}
