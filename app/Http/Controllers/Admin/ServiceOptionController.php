<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ServiceOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServiceOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = ServiceOption::where('service_id',$_GET['service_id'])->get();
        return view('admin.service_options.index',['options'=>$options]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service_options.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $locales = config('translatable.locales');

        $service = new ServiceOption();
        $service->service_id = $request->service_id;
        $service->save();
        foreach ($locales as $locale) {
            $service->translateOrNew($locale)->title = $request->title[$locale];
        }
        $service->save();
        Session::flash('message','Your work has been saved');
        return redirect()->route('admin.services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = ServiceOption::findOrFail($id);
        return view('admin.service_options.edit',['service'=>$service]);
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
        $locales = config('translatable.locales');

        $service = ServiceOption::findOrFail($id);
        $service->save();
        foreach ($locales as $locale) {
            $service->translateOrNew($locale)->title = $request->title[$locale];
        }
        $service->save();
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
        $option = ServiceOption::findOrFail($id);
        $option->delete();
        return redirect()->back();
    }
}
