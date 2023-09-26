<?php

use App\Models\News;
use App\Models\User;
use App\Models\Event;
use App\Models\Message;
use App\Models\Profile;
use App\Models\Property;
use App\Models\CommentPost;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Database\Seeders\EventsSeeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Password;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EventDataController;
use App\Http\Controllers\CommentPostController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\PropertyController;

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

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'handleLogin'])->name('login.handleLogin');
route::resource('register', RegisterController::class);
Route::get('/register', [LoginController::class, 'show'])->name('login.show');
Route::get('/register', [RegisterController::class, 'index'])->name('login.register');
Route::get('/', function () {
    return view('landingpage.landing'); // Mengganti 'welcome' dengan 'landingpage.landing'
});

Route::post('/submit-message', function (Request $request) {
    $message = new Message();
    $message->message = $request->input('message');
    $message->user_id = $request->input('user_id');
    $message->save();
    return redirect('/')->with('success', 'Pesan berhasil dikirim!');
});

// forgot password
Route::get('/forgot-password', function(){
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');
Route::post('/forgot-password', function(Request $request) {
    $request->validate(['email' => 'required|email']);
    $status = Password::sendResetLink(
        $request->only('email')
    );
    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

//reset password
Route::get('/reset-password/{token}', function($token){
    return view('auth.reset-password', ['token'=>$token]);
})->middleware('guest')->name('password.reset');
Route::post('/reset-password', function(Request $request){
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password),
            ])->setRememberToken(Str::random(60));
            $user->save();
            event(new PasswordReset($user));
        }
    );
    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login.index')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

//logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('editprofile/upload-document', [EditProfileController::class])->name('editprofile.uploadDocumentForm');
    Route::post('editprofile/upload-document',[EditProfileController::class])->name('editprofile.uploadDocument');
});
// profiles count
Route::get('/profiles/sejarah', function () {
    $profiles = Profile::all();
    $dataCount = User::where('role', 'member')->count();
    return view('profiles.sejarah', compact('profiles', 'dataCount'));
})->name('sejarah');
Route::get('/dashboard/profiles/{profiles}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
Route::put('/dashboard/profiles/{profiles}', [ProfileController::class, 'update'])->name('profiles.update');
Route::delete('/dashboard/profiles/{profiles}', [ProfileController::class, 'destroy'])->name('profiles.destroy');

route::resource('editprofile', EditProfileController::class);
Route::get('editprofile', [EditProfileController::class, 'index'])->name('editprofile.show');
Route::get('/editprofile/edit', 'EditProfileController@edit')->name('editprofile.edit');
Route::put('/editprofile/update', 'EditProfileController@update')->name('editprofile.update');
Route::post('editprofile', [EditProfileController::class, 'store'])->name('editprofile.store');
Route::get('editprofile/{editprofile}', [EditProfileController::class, 'edit'])->name('editprofile.edit');
Route::delete('editprofile/{editprofile}', [EditProfileController::class, 'destroy'])->name('editprofile.destroy');
//events
Route::get('/', function () {
    $users = User::all();
    $properties = Property::all();
    $profile = Profile::all();
    $events = Event::all();
    $comment_post = CommentPost::all();
    $news = News::all();
    return view('landingpage.landing', compact('news', 'comment_post', 'events', 'profile', 'properties', 'users'));
})->name('news');

Route::middleware(['checkUserRole:member'])->group(function () {
Route::middleware(['crudAccess'])->group(function () {
Route::get('/dashboard/event_crud', [EventController::class, 'index'])->name('dashboard.event_crud');
Route::get('/dashboard/commentposts_crud', [CommentPostController::class, 'index'])->name('dashboard.commentposts_crud');
Route::get('/dashboard/message_crud', [MessageController::class, 'index'])->name('dashboard.message_crud');
Route::get('/dashboard/setting_crud', [ProfileController::class, 'setting'])->name('dashboard.setting_crud');
Route::get('/dashboard/news_crud', [NewsController::class, 'index'])->name('dashboard.news_crud');
Route::get('/dashboard/property_crud', [PropertyController::class, 'index'])->name('dashboard.property_crud');
Route::resource('property', PropertyController::class);
Route::get('/dashboard/news', function () {
    $news = News::all();
    $profile = Profile::all();
    return view('dashboard.news', compact('news', 'profile'));
})->name('news');

Route::get('/dashboard/membersdata', function () {
    $users = User::all();
    $profile = Profile::all();
    return view('dashboard.membersdata', compact('users', 'profile'));
})->name('users');


Route::get('/dashboard/eventdesc1', function () { return view('dashboard.eventdesc1'); });
Route::get('/event/{id}', [EventController::class, 'show'])->name('event.show');
Route::get('/eventdesc1/{id}', [EventController::class, 'show'])->name('eventdesc1.show');
Route::get('/eventdesc2/{id}', [EventController::class, 'show'])->name('eventdesc2.show');
Route::get('/dashboard/eventdesc1', function () {
    $events = Event::all();
    return view('dashboard.eventdesc1', compact('events'));
})->name('eventdesc1');
Route::get('/dashboard/news/{id}', 'App\Http\Controllers\NewsController@showReadMore')->name('dashboard.news.readmore');

Route::get('/dashboard/review', [CommentPostController::class, 'review'])->name('dashboard.review');
Route::post('/dashboard/review', [CommentPostController::class, 'store'])->name('comment_posts.store');
Route::get('/dashboard/message', [MessageController::class, 'create'])->name('message.create');
Route::post('/dashboard/message', [MessageController::class, 'store'])->name('message.store');
Route::get('/dashboard/message/{message}', [MessageController::class, 'show'])->name('message.show');
Route::get('/dashboard/message/{message}/edit', [MessageController::class, 'edit'])->name('message.edit');
Route::put('/dashboard/message/{message}', [MessageController::class, 'update'])->name('message.update');
Route::delete('/dashboard/message/{message}', [MessageController::class, 'destroy'])->name('message.destroy');
Route::view('/dashboard/message', 'dashboard.message')->name('dashboard.message');

Route::get('/dashboard/membersdata', function () {
    $users = User::all();
    $profile = Profile::all();
    return view('dashboard.membersdata', compact('users', 'profile'));
})->name('users');

Route::resource('news', NewsController::class);
Route::resource('comment_posts', CommentPostController::class);
//edit profile
Route::get('/dashboard/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/dashboard/events', [EventController::class, 'store'])->name('events.store');
Route::get('/dashboard/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/dashboard/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/dashboard/events/{event}', [EventController::class, 'update'])->name('events.update');
Route::delete('/dashboard/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
Route::view('/dashboard/event', 'dashboard.event')->name('dashboard.event');
Route::resource('users', UserController::class);
Route::post('/event/register', [EventDataController::class, 'registerEvent'])->name('event.register');
Route::get('/dashboard', [EventDataController::class, 'index'])->name('dashboard')->middleware('auth');
Route::delete('/dashboard/event/{id}', [EventDataController::class, 'destroy'])->name('event.destroy')->middleware('auth');
Route::get('/dashboard/data_crud', [EventController::class, 'index'])->name('dashboard.data_crud');
Route::get('/dashboard/event', function () {
    $profile = Profile::all();
    $events = Event::all();
    return view('dashboard.event', compact('events', 'profile'));
})->name('event');
    });
});



Route::middleware(['checkUserRole:non-member'])->group(function () {
    Route::get('/dashboard', [EventDataController::class, 'index'])->name('dashboard')->middleware('auth');
    Route::get('/dashboard/membersdata', function () {
        $users = User::all();
        $profile = Profile::all();
        return view('dashboard.membersdata', compact('users', 'profile'));
    })->name('dashboard.membersdata');
});



Route::get('/dashboard/eventdesc1', function () { return view('dashboard.eventdesc1'); });
Route::get('/event/{id}', [EventController::class, 'show'])->name('event.show');
Route::get('/eventdesc1/{id}', [EventController::class, 'show'])->name('eventdesc1.show');
Route::get('/eventdesc2/{id}', [EventController::class, 'show'])->name('eventdesc2.show');
Route::get('/dashboard/eventdesc1', function () {
    $profile = Profile::all();
    $events = Event::all();
    return view('dashboard.eventdesc1', compact('events', 'profile'));
})->name('eventdesc1');
Route::get('/dashboard/news/{id}', 'App\Http\Controllers\NewsController@showReadMore')->name('dashboard.news.readmore');

Route::get('/dashboard/review', [CommentPostController::class, 'review'])->name('dashboard.review');
Route::post('/dashboard/review', [CommentPostController::class, 'store'])->name('comment_posts.store');
Route::get('/dashboard/message', [MessageController::class, 'create'])->name('message.create');
Route::post('/dashboard/message', [MessageController::class, 'store'])->name('message.store');
Route::get('/dashboard/message/{message}', [MessageController::class, 'show'])->name('message.show');
Route::get('/dashboard/message/{message}/edit', [MessageController::class, 'edit'])->name('message.edit');
Route::put('/dashboard/message/{message}', [MessageController::class, 'update'])->name('message.update');
Route::delete('/dashboard/message/{message}', [MessageController::class, 'destroy'])->name('message.destroy');
Route::view('/dashboard/message', 'dashboard.message')->name('dashboard.message');
