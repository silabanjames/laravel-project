@extends('layouts.main')

@section('container')

<div class="row justify-content-center align-items-center form-input">
    <div class="col-lg-3">
        <main class="form-register w-100 m-auto">
            <form action="/register" method="post">
                @csrf

                <h1 class="h3 mb-3 fw-normal text-center">Register</h1>
                
                <div class="form-floating">
                    <input type="text" class="form-control rounded-top  @error('name') is-invalid @enderror " id="floatingName" placeholder="" name="name" required value="{{ old('name') }}">
                    <label for="floatingName">Name</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                    
                <div class="form-floating">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="floatingUsername" placeholder="" name="username" required value="{{ old('username') }}">
                    <label for="floatingUsername">Username</label>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingEmail" placeholder="" name="email" required value="{{ old('email') }}">
                    <label for="floatingEmail">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password" required >
                    <label for="floatingPassword">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <button class="btn btn-primary w-100 py-2 mt-4" type="submit">Register</button>
                <p class="mt-2 mb-3 text-body-secondary text-center">Already registered? <a href="#">Login</a></p>
            </form>
        </main>
    </div>
</div>

@endsection 