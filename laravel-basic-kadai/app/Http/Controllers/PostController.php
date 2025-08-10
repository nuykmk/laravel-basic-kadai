<?php

namespace App\Http\Controllers;   //このコントローラが「App\Http\Controllers」にあるよ！と宣言する


use Illuminate\Http\Request;   //ユーザーのリクエスト（入力データなど）を扱うためのクラスを読み込む
use Illuminate\support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')->get();

        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {

        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }
}
