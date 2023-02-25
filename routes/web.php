<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\myController\testController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/about-me', function () { //url path.
//     return view('about'); //file name
// });

// Route::get('/contact-me', function () { //url path.
//     return view('contact'); //file name
// });


//Routing or Navigating to pages
// Route::get('/', [testController::class, 'Index'])->name("myHome");
// Route::get('/about-me', [testController::class, 'About'])->name("myAboutMe");
// Route::get('/contact-me', [testController::class, 'Contact'])->name("myContactMe");

//grouping routes

Route::controller(testController::class)->group(function () {
    Route::get('/', 'Index')->name("myHome");
    Route::get('/about-me',  'About')->name("myAboutMe");
    Route::get('/contact-me', 'Contact')->name("myContactMe");
    Route::get('/my-blog', 'blog')->name("blog-post");
});
