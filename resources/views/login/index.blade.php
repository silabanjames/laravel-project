@extends('layouts.main')

@section('container')


<div class="row justify-content-center align-items-center form-input">
    <div class="col-lg-3">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        


        <main class="form-signin w-100 m-auto">
            <form action="/login" method="post">
                @csrf
                <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
                
                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="" required>
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                
                <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Login</button>
                <p class="mt-2 mb-3 text-body-secondary text-center">Not registered? <a href="/register">Register</a></p>
            </form>
        </main>
    </div>
</div>
        
@endsection