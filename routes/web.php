<?php

use App\Events\SomeoneCheckedProfile;
use App\Jobs\SendMailJob;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('send_email', function (){

 // using dispatch function queue.

    // dispatch(
    //     function () {
    //         $mailData = [
    //             'title' => 'Mail from yashin.com',
    //             'body' => 'This is for testing email using smtp.'
    //         ];
    //         Mail::to('your@gmail.com')->send(new WelcomeEmail($mailData));
    //     }

    // )->delay(now()->addSecond(2));

    // Second way
    // dispatch(new SendMailJob);

    // Third way
    $user= User::find(4);
    $mailData = [
               'name' => $user->name,
               'email' => $user->email
           ];
       SendMailJob::dispatch($mailData);

       dump("Email is sent successfully.");

});

Route::get('events', function () {
    $user = User::inRandomOrder()->first();

    // First way to fire an event (using event handlers)
    // event(new SomeoneCheckedProfile($user));

    // Second way to fire an event (using dispatcher)
    SomeoneCheckedProfile::dispatch($user);

    dump("Email is sent successfully to " . $user->name);

});