<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Post;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Str;
use Illuminate\Support\ValidatedInput;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            "posts"=>Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'categories' =>Categories::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $validateInput = $request->validate([
            'title'=>'required|max:255',
            'slug'=>'required|unique:posts',
            'categories_id'=>'required',
            'body'=>'required'
        ]);

        $validateInput['user_id'] = auth()->user()->id;
        $validateInput['excerpt'] = Str::of(strip_tags($request->body))->limit(100);

        Post::create($validateInput);

        return redirect('/dashboard/posts')->with('success', 'Post berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post'=> $post,
            'categories' =>Categories::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title'=>'required|max:255',
            'categories_id'=>'required',
            'body'=>'required'
        ];

        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:posts';
        }

        $validateInput = request()->validate($rules);

        $validateInput['excerpt'] = Str::of(strip_tags($request->body))->limit(100);

        Post::where('id', $post->id)->update($validateInput);

        return redirect('/dashboard/posts')->with('success', 'Edit post has been successed!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug'=> $slug]);
    }

}
