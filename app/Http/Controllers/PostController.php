<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Categories;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        // Test 
        // dd(request('search'));

        // Menggunakan filter pada Controller, TIDAK DISARANKAN
        // $posts = Post::latest();

        // if(request('search')){
        //     // dd(request('search'));
        //     $posts->where('title', 'like', '%' . request('search') . '%')
        //         ->orWhere('body', 'like', '%' . request('search') . '%');
        // }

        $title = '';
        if(request('category')){
            $category = Categories::firstWhere('slug', request('category'));
            $title = ' in: ' . $category->name;
        }
        if(request('author')){
            $author =  User::firstWhere('username', request('author'));
            $title = ' By: ' . $author->name;
        }

        return view('/posts', [
            "judul" => "All Post" . $title,
            "active"=> "blog",
            // Tidak dibutuhkan, dikarenakan bagian with telah dipindahkan ke PostController
            // "posts" => Post::with(['categories', 'author'])->latest()->get(),
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString(),
        ]);
    }

    public function singlePost(Post $post){
        // $new_post = Post::find($slug);

        return view('/post', [
            "judul"=> "Single Post",
            "active"=> "blog",
            "post"=>$post
        ]);
    }
}
