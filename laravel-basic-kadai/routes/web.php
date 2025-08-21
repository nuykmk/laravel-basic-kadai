<?php

use App\Http\Controllers\ProfileController;
//「ルート定義に使う Route クラスを読み込みますよ！」
use Illuminate\Support\Facades\Route;     //Route クラスを使えるようにする
//「PostControllerを使いますよ！」とLaravelに伝える宣言
use App\Http\Controllers\PostController; //PostController を使えるようにする
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
  return view('welcome');
});

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store')->middleware('auth');


Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/{id}', [PostController::class, 'show']);
