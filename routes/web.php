<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\myController\testController;
use App\Http\Controllers\AdminController;

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
    // Route::get('/', 'Index')->name("dashboard");
    Route::get('/about-me',  'About')->name("myAboutMe");
    Route::get('/contact-me', 'Contact')->name("myContactMe")->middleware('salary');
    Route::get('/test', 'Test')->name("myTest");
});




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//admin routes

Route::controller(AdminController::class)->group(function () {

    Route::get('/admin/logout',  'destroy')->name("admin.logout");
    Route::get('/admin/profile',  'Profile')->name("admin.profile");
    Route::get('/admin/edit',  'EditProfile')->name("edit.profile");
    Route::post('/store/profile',  'StoreProfile')->name("store.profile");
    Route::get('/change/password',  'ChangePassword')->name("change.password");
    Route::post('/update/password',  'UpdatePassword')->name("update.password");
});

require __DIR__ . '/auth.php';
