<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'LandingpageController@index')->name('landingpage');
Route::get('view/{announcement}', 'LandingpageController@view')->name('view');
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('optimize:clear');
    // return what you want
});
Route::get('/migrate-fresh', function() {
    $exitCode = Artisan::call('migrate:fresh --seed');
    // return what you want
});

Auth::routes(['verify' => true]);

Route::group(['prefix' => 'patient', 'as' => 'patient.', 'namespace' => 'Patient', 'middleware' => ['auth', 'verified']], function () {
   
    //User Update
    Route::get('update', 'UserController@updateshow')->name('updateshow');
    Route::post('update/{user}', 'UserController@update')->name('update');
    Route::put('changepassword/{user}', 'UserController@changepassword')->name('changepassword');

    //Notification
    Route::put('notification/{notif}', 'NotificationController@notification')->name('notification');

});

Route::group(['prefix' => 'patient', 'as' => 'patient.', 'namespace' => 'Patient', 'middleware' => ['auth', 'verified', 'checkregistered']], function () {
   
    // Brgy Certificate
    Route::resource('appointment', 'AppointmentController');
    
     // Home
     Route::get('home', 'HomeController@index')->name('home');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    // Home
    Route::get('home', 'HomeController@index')->name('home');

   
    Route::resource('appointment', 'AppointmentController');

     Route::get('patient_list', 'PatientListController@index')->name('patient');
     Route::get('patient_list/{user}/edit', 'PatientListController@edit')->name('patient.edit');
     Route::put('patient_list/{user}', 'PatientListController@update')->name('patient.update');
     Route::put('patient_list/{user}/dpass', 'PatientListController@defaultPassowrd')->name('patient.dpass');

     Route::resource('announcements', 'AnnouncementsController');
     Route::post('announcements/update/{announcement}', 'AnnouncementsController@updateannouncement')->name('announcements.updateannouncement');

     Route::resource('services', 'ServiceController');
     Route::get('date_time', 'ServiceController@date_time')->name('date_time');
});
