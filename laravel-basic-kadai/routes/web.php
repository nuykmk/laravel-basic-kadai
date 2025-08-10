<?php
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/{id}', [PostController::class, 'show']);
