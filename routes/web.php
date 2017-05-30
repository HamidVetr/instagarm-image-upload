<?php

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
});

Route::get('instagram', 'InstagramController@index');

Route::get('instalogin', function (){
    $ig = new \InstagramAPI\Instagram();

    $username = 'horoofnegar';
    $password = 'Serint9263';

    $ig->setUser($username, $password);
    $ig->login();

    $metadata = [
        'caption' => 'تست آپلود عکس از داشبورد توی صفحه اینستا گرام',
//        'location' => $location, // $location must be an instance of Location class
    ];

    $photoFile = "C:\\7.jpg";

// if you want only a caption, you can simply do this:
//    $metadata = ['caption' => 'My awesome caption'];

    $ig->uploadTimelinePhoto($photoFile, $metadata);

    dd($ig);
});