<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserRegisteredController;
use App\Jobs\PostTranslate;
use App\Mail\BlogPost;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/test', function(){
    $post = Post::find(1);
    dispatch(new PostTranslate($post));
    return 'done';
});


Route::post('/signup',[UserRegisteredController::class, 'store']);
Route::post('/login',[SessionController::class, 'store']);
Route::get('/login',[SessionController::class, 'create'])->name('login');
Route::post('/logout',[SessionController::class, 'destroy']);
Route::get('/signup',[UserRegisteredController::class, 'create']);


Route::get('/posts',[PostsController::class, 'index'])->middleware('auth');
Route::get('/posts/create',[PostsController::class, 'create'])->middleware('auth');
Route::get('posts/{post}/edit',[PostsController::class, 'edit'])->middleware(['auth', 'can:edit-post,post']);
Route::patch('posts/{post}/update',[PostsController::class, 'update']);
Route::get('/posts/{post}',[PostsController::class, 'show']);
Route::delete('/posts/{post}/delete',[PostsController::class, 'destroy']);

Route::post('/posts/create',[PostsController::class, 'store']);
/*
1-Create mail.
2-Create view to show mail message contect.
3-when sending a message in locl host it soesn't actuaaly send
it just logged to [storage -> logs -> laravel.log]
4-mailtrap.

*/
