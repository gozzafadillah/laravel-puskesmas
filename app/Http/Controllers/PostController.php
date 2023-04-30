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
        return view('post', [
            "title" => "Postingan",
            'active' => 'posts',
            "post" => $post
        ]);
    }

    public function search(Request $request)
    {
        $output = "";
        $query = $request->input('query');
        $results = Post::where('title', 'like', '%' . $query . '%')->get();

        if (count($results) == 0) {
            $output = '<p>Tidak ada hasil yang ditemukan</p>';
        } else {
            foreach ($results as $result) {
                $output .= '
                <a class="btn-search-post text-dark hover-bg" href="/posts/' . $result->slug . '">
                <h5>' . $result->title . '</h5>
                <p class="mb-1" disabled>' . $result->category->name . '</p>
                <p>' . $result->excerpt . '</p>
                </a>
                ';
            }
        }
        return response($output);
    }
}
