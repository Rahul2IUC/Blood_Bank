<?php
return $routes = [
    'GET' => [
        '/' => 'PagesController@home',
        '/login' => 'LoginController@receiverLoginForm',
        '/signup' => 'SignupController@receiverSignupForm',
        '/logout' => 'LogoutController@logout',
        '/receiver/dashboard' => 'ReceiverController@showDashboard',
        '/hospital/login' => 'LoginController@hospitalLoginForm',
        '/hospital/signup' => 'SignupController@hospitalSignupForm',
        '/hospital/bloodsample/addbloodinfo' =>'HospitalController@showAddBloodInfoPage',
        '/hospital/dashboard' => 'HospitalController@showDashboard',
        '/hospital/viewrequests' => 'HospitalController@viewRequests',
    ],
    'POST' => [
        '/login' => 'LoginController@receiverLogin',
        '/logout' => 'LogoutController@logout',
        '/signup' => 'SignupController@receiverSignup',
        '/receiver/requestsample' => 'ReceiverController@addBloodSampleRequest',
        '/hospital/signup' => 'SignupController@hospitalSignup',
        '/hospital/login' => 'LoginController@hospitalLogin',
        '/hospital/addbloodsample' => 'HospitalController@addNewBloodSample',
    ]
];