<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard(){
        $users_count = \App\User::Role('user')->select(DB::raw('count(id) as `data`'), DB::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),  DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
            ->groupby('year','month')
            ->pluck('data')->toArray();
        $providers_count = \App\User::Role('provider')->select(DB::raw('count(id) as `data`'), DB::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),  DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
            ->groupby('year','month')
            ->pluck('data')->toArray();
        $total_requests = \App\Request::count();
        $pending = \App\Request::where('status','pending')->count();
        $in_progress = \App\Request::where('status','in-progress')->count();
        $completed = \App\Request::where('status','completed')->count();
        return view('admin.dashboard',[
            'users_count'    =>     $users_count,
            'providers_count'=>     $providers_count,
            'pending'        =>     $pending,
            'in_progress'    =>     $in_progress,
            'completed'      =>     $completed,
            'total_requests' =>     $total_requests,
        ]);
    }//end dashboard

    public function log(){
        $notifications = \App\Notification::where('user_id',\Auth::id())->orderBy('id','desc')->paginate(15);
        return view('admin.log',['notifications'=>$notifications]);
    }
}
