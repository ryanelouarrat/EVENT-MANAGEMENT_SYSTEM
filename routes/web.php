<?php

use App\Models\Events;
use Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\eventController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\NewsletterController;


Route::get('/', [eventController::class,'index']);

Route::get('/signup',[UserController::class,'register'] )->middleware('guest');


Route::get('/login',function(){
    return view('login');
});

Route::get('/event',function(){
    return view('event');
});

Route::get('/EditProfile{user}', [UserController::class, 'viewupdateProfile']);
Route::put('/EditProfile{user}', [UserController::class, 'updateProfile'])->name('updateProfile');

Route::get('/profile',[EventController::class, 'manage'])->middleware('auth');
Route::get('/manageComments',[EventController::class, 'manageComments'])->middleware('auth');

Route::get('/search', [EventController::class, 'search'])->name('search');


Route::get('/event{event}',[eventController::class,'show']);


Route::post('/event',[eventController::class,'store'])->middleware('auth');


Route::delete('/events/{event}', [EventController::class, 'destroy'])->middleware('auth')->name('deleteEvent');
Route::get('/edit{event}',[eventController::class,'edit'])->middleware('auth');

Route::put('/events{event}',[eventController::class,'update'])->middleware('auth');

Route::get('/create', [EventController::class, 'create'])->middleware('auth');

Route::post('/users',[UserController::class,'store'] )->middleware('guest');


Route::post('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/logout', [UserController::class,'logout'])->name('logout')->middleware('auth');


Route::get('/analytics', [AnalyticsController::class, 'showAnalytics'])->middleware('auth');

Route::get('/event{event}', [CommentController::class, 'index']);
Route::post('/event{event}', [CommentController::class, 'store']);
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('deleteComment');
Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('subscribe');

// Route::get('',function(){
//     return view('Events',[]);
// });
