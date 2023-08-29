@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <h1>{{ $post->title }}</h1>
            
            <p>By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->categories->slug }}" class="text-decoration-none">{{ $post->categories->name }}</a></p>
            
            <img src="https://source.unsplash.com/random/1200x400/?{{ $post->categories->name }}" alt="" class="img-fluid">
            
            <article class="mt-5 fs-5">
                {!! $post->body !!} 
            </article>
            
            <div class="d-grid d-md-block">
                <a href="/posts" class="btn btn-primary my-5">Kembali ke Blog</a>
            </div>
        </div>
    </div>
</div>

@endsection

