<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' kategori dari ' . $category->name;
        };

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' Postingan dari ' . $author->name;
        };
        
        return view('posts', [
            "title" => $title,
            'active' => 'posts',
            // "posts" => Post::all()
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString() //menampilkan 7per halaman dan data/postingan terbaru
        ]);
    }

    public function show(Post $post)
    {
        return view ('post', [
            "title" => "Postingan",
            'active' => 'posts',
            "post" => $post
        ]);
    }
}
