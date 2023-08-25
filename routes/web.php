<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CommentPostController;
use App\Http\Controllers\MessageController;

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



route::resource('login', LoginController::class);
route::resource('register', RegisterController::class);


Route::get('/', function () {
    return view('landingpage.landing'); // Mengganti 'welcome' dengan 'landingpage.landing'
});

Route::post('/submit-message', function (Request $request) {
    $message = new Message();

    $message->name = $request->input('name');
    $message->message = $request->input('message');
    $message->user_id = $request->input('user_id');

    $message->save();

    return redirect('/')->with('success', 'Pesan berhasil dikirim!');
});

Route::get('/dashboard/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/dashboard/events', [EventController::class, 'store'])->name('events.store');
Route::get('/dashboard/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/dashboard/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/dashboard/events/{event}', [EventController::class, 'update'])->name('events.update');
Route::delete('/dashboard/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
Route::view('/dashboard/event', 'dashboard.event')->name('dashboard.event');

// ends

// sejarah
Route::get('/profile/sejarah', function () {
    return view('profile.sejarah');
})->name('sejarah');



Route::resource('comment_posts', CommentPostController::class);

// dahsboard
Route::get('/dashboard', function () {
    return view('dashboard.index');
});
Route::get('/dashboard/data_crud', [EventController::class, 'index'])->name('dashboard.data_crud');

// comment post
Route::get('/commentpost', function () {
    return view('commentpost.index_users');
});

// message
Route::resource('message', MessageController::class);
