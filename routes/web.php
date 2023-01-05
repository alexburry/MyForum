<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubforumController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/p/{user}', [ProfileController::class, 'show'])->name('profile.show');

// Subforum Routes
Route::get('/f', [SubforumController::class, 'index'])->name('subforums.index');
Route::get('/f/{subforum}', [SubforumController::class, 'show'])->name('subforums.show');

// Posts Routes
Route::get('/f/{subforum}/make-post', [PostController::class, 'create'])->middleware(['auth', 'verified'])->name('posts.create');
Route::post('posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/f/{subforum}/{post}/edit-post', [PostController::class, 'edit'])->name('posts.edit');
Route::post('posts/edit/{post}', [PostController::class, 'update'])->name('posts.update');
Route::get('/f/{subforum}/{post}', [PostController::class, 'show'])->name('subforum.posts.show');
Route::delete('/f/{subforum}/{post}', [PostController::class, 'destroy'])->name('subforum.posts.destroy');

// Comments routes
Route::get('/f/{subforum}/{post}/make-comment', [CommentController::class, 'create'])->middleware(['auth', 'verified'])->name('comments.create');
Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/f/{subforum}/{post}/{comment}/edit-comment', [CommentController::class, 'edit'])->name('comments.edit');
Route::post('comments/edit/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/f/{subforum}/{post}/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::group(['middleware' => 'role:mod'], function() {
    Route::get('/mod', function() {
 
       return 'Welcome Moderator';       
    });
});
 

require __DIR__.'/auth.php';
