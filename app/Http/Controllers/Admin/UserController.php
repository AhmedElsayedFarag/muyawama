<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = $_GET['type'];
        if ($type != 'not_activated'){
            $users = User::Role($type)->where('admin_verified',1)->get();
        }else{
            $users = User::where('admin_verified',0)->get();
        }
        return view('admin.users.index',['users'=>$users]);

    }

    public function activate_user($id){
        $user = User::findOrFail($id);
        $user->admin_verified = 1;
        $user->save();
        Session::flash('message','activated successfully');
        return redirect()->back();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        if ($user->hasRole('user')){
            $total_requests = \App\Request::where('user_id',$user->id)->count();
            $pending = \App\Request::where([
                ['user_id',$user->id],['status','pending']
            ])->count();
            $in_progress = \App\Request::where([
                ['user_id',$user->id],['status','in-progress']
            ])->count();
            $completed = \App\Request::where([
                ['user_id',$user->id],['status','completed']
            ])->count();

        }elseif ($user->hasRole('provider')){
            $total_requests = \App\Request::where('provider_id',$user->id)->count();
            $pending = \App\Request::where([
                ['provider_id',$user->id],['status','pending']
            ])->count();
            $in_progress = \App\Request::where([
                ['provider_id',$user->id],['status','in-progress']
            ])->count();
            $completed = \App\Request::where([
                ['provider_id',$user->id],['status','completed']
            ])->count();
        }else{
            $total_requests = 0;
            $pending   = 0;
            $in_progress   = 0;
            $completed   = 0;
        }
        return view('admin.users.show',[
            'user'=>$user,
            'total_requests'=>$total_requests,
            'pending'        =>     $pending,
            'in_progress'    =>     $in_progress,
            'completed'      =>     $completed,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->password){
            $user->password = bcrypt($request->password);
        }
        if ($request->hasFile('image')){
            if (File::exists($user->image)) {
                File::delete($user->image);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().mt_rand(1000,9999).'.'.$extension;
            $file->move(public_path('img/users/'), $filename);

            $user->image = 'img/users/'.$filename;
        }//end if
        $user->save();
        Session::flash('message','Your work has been saved');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }
}
