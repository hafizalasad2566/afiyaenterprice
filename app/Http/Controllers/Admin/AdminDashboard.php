<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    public function getDashboard(){
        $count['userCount'] = User::role('CLIENT')->count();
        $count['activeUserCount'] = User::role('CLIENT')->whereActive(1)->count();
        $count['blockedUserCount'] = User::role('CLIENT')->whereActive(0)->count();
        return view('admin.dashboard',compact('count'));
    }
    public function userCreateShow(){
        return view('admin.user-create');
    }
}
