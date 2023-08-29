@extends('layouts.main')

@section('container')
<h1 class="mb-5 text-center">{{ $judul }}</h1>


<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/posts">
            @if (request('category'))
                <input type="hidden" name='category' value="{{ request('category') }}">
            @endif
            @if (request('author'))
                <input type="hidden" name='author' value="{{ request('author') }}">
            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                <button class="btn btn-danger" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>

@if ($posts->count())
<div class="card mb-3 text-center">
    <img src="https://source.unsplash.com/random/1000x300/?{{ $posts[0]->categories->name }}" class="card-img-top" alt="{{ $posts[0]->categories->name }}">
    <div class="card-body">
        <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-black">
            <h3 class="card-title">{{ $posts[0]->title }}</h3>
        </a>
        <p class="card-text">
            <small class="text-body-secondary">
                By. <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a href="/posts?category={{ $posts[0]->categories->slug }}" class="text-decoration-none">{{ $posts[0]->categories->name }} </a> {{ $posts[0]->created_at->diffForHumans() }}
            </small>
            
        </p>
        <p class="card-text">{{ $posts[0]-> excerpt}}</p>
        <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary ">Read more</a>
    </div>
</div>

<div class="container">
    <div class="row">
    {{-- <div class="d-flex"> --}}
        @foreach ($posts->skip(1) as $post)
        <div class="col-4 mb-3">
            <div class="card">
                <div class="position-absolute py-2 px-3" style="background-color: rgba(0, 0, 0, 0.5)"><a href="/posts?category={{ $post->categories->slug }}" class="text-decoration-none text-white ">{{ $post->categories->name }} </a></div>
                <img src="https://source.unsplash.com/random/500x400/?{{ $post->categories->name }}" class="card-img-top" alt="{{ $post->categories->name }}">
                <div class="card-body">
                    <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-black">
                        <h5 class="card-title">{{ $post->title }}</h5>
                    </a>
                    <p class="card-text">
                        <small class="text-body-secondary">
                            By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in  {{ $post->created_at->diffForHumans() }}
                        </small>
                    </p>
                    <p class="card-text">{{ $post-> excerpt}}</p>
                    <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                </div>
            </div>
        </div>
        @endforeach
    {{-- </div> --}}
    </div>
</div>

<div class="d-flex justify-content-end">
    {{ $posts->links() }}
</div>

    
@else
    <p class="text-center fs-4">No post Found</p>
@endif




@endsection
