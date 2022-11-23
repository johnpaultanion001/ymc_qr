<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'LandingpageController@index')->name('landingpage');
Route::get('/events', 'LandingpageController@events')->name('events');
Route::post('/student_register', 'LandingpageController@student_register')->name('student_register');
Route::get('view/{event}', 'LandingpageController@view')->name('view');
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('optimize:clear');
    // return what you want
});
Route::get('/migrate-fresh', function() {
    $exitCode = Artisan::call('migrate:fresh --seed');
    // return what you want
});

Auth::routes(['verify' => true]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    // Home
    Route::get('home', 'HomeController@index')->name('home');

   
    Route::get('students', 'StudentController@index')->name('students.index');
    Route::get('students_status', 'StudentController@status')->name('students.status');
    Route::delete('student_remove/{student}', 'StudentController@remove_student')->name('students.remove_student');
    

    Route::resource('events', 'EventsController');
    Route::post('events/update/{event}', 'EventsController@update_event')->name('events.update_event');
    Route::post('events/attendance/{event}/{student}', 'EventsController@attandance')->name('events.attandance');
    Route::get('events/attendance/{event}', 'EventsController@attandance_record')->name('events.attandance_record');
    Route::delete('events/attendance/{id}', 'EventsController@attandance_remove')->name('events.attandance_remove');
     

    Route::get('schedule_activities', 'ScheduleActivitiesController@index')->name('schedule_activities.index');

    //Accounts
    Route::get('trainors', 'AccountController@trainors')->name('account.trainors');
    Route::get('animators', 'AccountController@animators')->name('account.animators');

    Route::post('account/store', 'AccountController@store')->name('account.store');
    Route::get('account/{account}/edit', 'AccountController@edit')->name('account.edit');
    Route::put('account/{account}', 'AccountController@update')->name('account.update');
    Route::delete('account/{account}', 'AccountController@destroy')->name('account.destroy');
});
