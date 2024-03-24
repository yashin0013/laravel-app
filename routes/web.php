<?php

use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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
    $mailData = [
        'title' => 'Mail from yashin.com',
        'body' => 'This is for testing email using smtp.'
    ];
     
    Mail::to('your@gmail.com')->send(new WelcomeEmail($mailData));
       
    dd("Email is sent successfully.");
    // return view('welcome');
});
