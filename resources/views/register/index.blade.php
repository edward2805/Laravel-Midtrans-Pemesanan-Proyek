@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-4">
    <main class="form-regristrasi w-100 m-auto">
    <h1 class="h3 mb-3 fw-normal text-center">Form Registrasi</h1>
    <form action="/register" method="post">  
    @csrf
        <div class="form-floating">
        <input type="text" name="name" class="form-control rounded-bottom @error('name') is-invalid @enderror" 
        id="name" placeholder="name" required >
        <label for="name">Name</label>
        @error('name')
        <div class="invalid-feedback">
        {{ $message }}
        </div>
        @enderror
        </div>

        <div class="form-floating">
        <input type="text" name="username" class="form-control rounded-bottom @error('username') is-invalid @enderror" 
        id="username" placeholder="username" required >
        <label for="username">Username</label>
        @error('username')
        <div class="invalid-feedback">
        {{ $message }}
        </div>
        @enderror
        </div>

        <div class="form-floating">
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
        id="email" placeholder="name@example.com" required value="{{ old('email') }} ">
        <label for="email">Email address</label>
        @error('email')
        <div class="invalid-feedback">
        {{ $message }}
        </div>
        @enderror
        </div>

        <div class="form-floating">
        <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" 
        id="password" placeholder="Password" required >
        <label for="password">Password</label>
        @error('password')
        <div class="invalid-feedback">
        {{ $message }}
        </div>
        @enderror
        </div>
        
        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Registrasi</button>
    </form>
    <small class="d-block text-center mt-3">
        Sudah daftar ? <a href="/login">Login disini</a>
    </small>
    </main>
    
    </div>
</div>


@endsection