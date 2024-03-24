<?php

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
   $user= User::find(1);
 $mailData = [
            'name' => $user->name,
            'email' => $user->email
        ];
    SendMailJob::dispatch($mailData);
       
    dd("Email is sent successfully.");
    // return view('welcome');
});
