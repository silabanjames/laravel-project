@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-5">
            
            <h1 class="my-3">{{ $post->title }}</h1>
            
            <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all my posts</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            <form class="d-inline" action="/dashboard/posts/{{ $post->slug }}" method="post">
                @method('delete')
                @csrf
                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure want to delete this post?')"><span data-feather="x-circle"></span> Delete</button>
            </form>
            
            <img src="https://source.unsplash.com/random/1200x400/?{{ $post->categories->name }}" alt="" class="img-fluid mt-3">
            
            <article class="mt-5 fs-5">
                {!! $post->body !!} 
            </article>
            
            {{-- <div class="d-grid d-md-block">
                <a href="/posts" class="btn btn-primary my-5">Kembali ke Blog</a>
            </div> --}}
        </div>
    </div>
</div>

@endsection