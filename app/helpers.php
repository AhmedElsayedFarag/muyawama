<?php

function sendNotification($firebaseToken,$title,$body){
//    $firebaseToken = \App\User::whereNotNull('device_token')->pluck('device_token')->all();
    $SERVER_API_KEY = 'AAAA-6jgg1E:APA91bFjkrShv-15jtDwAN5blYJw_C2Sb-4M9x-aHbaMvMCUc7o8fuCjlIzOGMShZ8pJ8hQX9C3LDC8Tifr0Sc6UMIPpipfLdx7_DZOn0ldqVzyzLVl9yrwWrwpdQ1RKqsCcPEE6_IEo';
    $data = [
        "registration_ids" => $firebaseToken,
        "notification" => [
            "title" => $title,
            "body" => $body,
        ]
    ];
    $dataString = json_encode($data);
    $headers = [
        'Authorization: key=' . $SERVER_API_KEY,
        'Content-Type: application/json',
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
    $response = curl_exec($ch);
    return $response;
}//end sendNotification


function getUserProfileServices($services,$lang){
    $user_services_ids = $services->pluck('service_id')->toArray();
    $services = \App\Service::whereIn('id',$user_services_ids)->get();
    $a = [];
    $b = [];
    foreach ($services as $service){
        $a[\App\Service::find($service->parent_id)->translate($lang)->name][] = new \App\Http\Resources\ServiceResource($service);
    }
    foreach ($a as $key=>$value){
        $b[]=[
            'parent_name'=>$key,
            'sub_services'=>$value,
        ];
    }
    return $b;
}//end getUserProfileServices

function getUserRateWord($number){
    $rates = [
        'not reviewed yet',
        'poor',
        'fair',
        'good',
        'very good',
        'excellent',
    ];
    return $rates[$number];
}//end getUserRateWord
