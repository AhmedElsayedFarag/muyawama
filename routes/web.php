<?php

use App\Service;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')->middleware(['auth','checkAdmin'])->group(function () {
    Route::get('dashboard', 'Admin\AdminController@dashboard')->name('dashboard');
    Route::get('time-line', 'Admin\AdminController@log')->name('log');



    Route::resource('services', \Admin\ServiceController::class,['as'=>'admin']);
    Route::resource('service_options', \Admin\ServiceOptionController::class,['as'=>'admin']);
    Route::resource('sliders', \Admin\SliderController::class,['as'=>'admin']);
    Route::resource('users', \Admin\UserController::class,['as'=>'admin']);
    Route::resource('orders', \Admin\OrderController::class,['as'=>'admin']);
    Route::resource('settings', \Admin\SettingController::class,['as'=>'admin']);
    Route::resource('cities', \Admin\CityController::class,['as'=>'admin']);
    Route::resource('areas', \Admin\AreaController::class,['as'=>'admin']);
    Route::resource('contacts', \Admin\ContactController::class,['as'=>'admin']);
    Route::get('users/activate/{user_id}', 'Admin\UserController@activate_user')->name('admin.users.activate');

});
Route::get('send', 'Admin\FirebaseController@sendMessage');

Route::get('/test', function () {

//    $routes = \App\User::Role('provider')->select(DB::raw('count(id) as `data`'), DB::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),  DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
//        ->groupby('year','month')
//        ->pluck('data')->toArray();
//
//    dd($routes);


//    $user = \App\User::find(35);
//    $user_services_ids = $user->services->pluck('service_id')->toArray();
////    dd($user_services_ids);
//    $services = Service::whereIn('id',$user_services_ids)->get();
//    $a = [];
//    foreach ($services as $service){
//        $a[Service::find($service->parent_id)->translate('en')->name][] = new \App\Http\Resources\ServiceResource($service->translate('en'));
//    }
//    dd($a);


//    $user = new \App\User();
//    $user->name = 'admin';
//    $user->phone = '01061756297';
//    $user->email = 'admin@admin.com';
//    $user->password = bcrypt('123456789');
//    $user->save();
//    $role = \Spatie\Permission\Models\Role::create(['name' => 'admin']);
//    $role = \Spatie\Permission\Models\Role::create(['name' => 'provider']);
//    $role = \Spatie\Permission\Models\Role::create(['name' => 'user']);
//    $user->assignRole('admin');




//    $firebaseToken = \App\User::whereNotNull('device_token')->pluck('device_token')->all();
//
//    $SERVER_API_KEY = 'AAAA-6jgg1E:APA91bFjkrShv-15jtDwAN5blYJw_C2Sb-4M9x-aHbaMvMCUc7o8fuCjlIzOGMShZ8pJ8hQX9C3LDC8Tifr0Sc6UMIPpipfLdx7_DZOn0ldqVzyzLVl9yrwWrwpdQ1RKqsCcPEE6_IEo';
//
//    $data = [
//        "registration_ids" => $firebaseToken,
//        "notification" => [
//            "title" => 'ssss',
//            "body" => 'ssss',
//        ]
//    ];
//    $dataString = json_encode($data);
//
//    $headers = [
//        'Authorization: key=' . $SERVER_API_KEY,
//        'Content-Type: application/json',
//    ];
//
//    $ch = curl_init();
//
//    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
//    curl_setopt($ch, CURLOPT_POST, true);
//    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
//
//    $response = curl_exec($ch);
//
//    dd($response);

});
