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
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Models\News;

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
Route::get('/dashboard/message/create', [MessageController::class, 'create'])->name('message.create');
Route::post('/dashboard/message', [MessageController::class, 'store'])->name('message.store');
Route::get('/dashboard/message/{message}', [MessageController::class, 'show'])->name('message.show');
Route::get('/dashboard/message/{message}/edit', [MessageController::class, 'edit'])->name('message.edit');
Route::put('/dashboard/message/{message}', [MessageController::class, 'update'])->name('message.update');
Route::delete('/dashboard/message/{message}', [MessageController::class, 'destroy'])->name('message.destroy');
Route::view('/dashboard/message', 'dashboard.message')->name('dashboard.message');



Route::resource('users', UserController::class);

//event review
Route::get('/review/event-review', function () {
    return view('review.event_review');
});


//news
// message
Route::get('/dashboard/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/dashboard/news', [NewsController::class, 'store'])->name('news.store');
Route::get('/dashboard/news/{news}', [NewsController::class, 'show'])->name('news.show');
Route::get('/dashboard/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
Route::put('/dashboard/news/{news}', [NewsController::class, 'update'])->name('news.update');
Route::delete('/dashboard/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
Route::view('/dashboard/news', 'dashboard.news')->name('dashboard.news');

