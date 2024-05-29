@extends('layout/template')

@section('title')
    BookShop | Login Page
@endsection


@section('content')

    <h1 class="text-center fw-bold" id="welcome-login">WELCOME TO BOOKSHOP WEBSITE</h1>
    <br><br>
    <div class="col-md-4 col-12 offset-md-4 border" id="login">
        <br>
        <h2 class="col-10 offset-1">Sign in</h2>
        <br>
        <form action="{{ url('login') }}" method="post" class="col">
            @csrf
            <div class="col-10 offset-1">
                <input type="email" name="email" class="form-control col-12" placeholder="Enter your email address" aria-label="email">
            </div>
            @error('email')
                <div class="text-danger col-10 offset-1 small"> {{ $message }} </div>
            @enderror
            <br>
            <div class="col-10 offset-1">
                <input type="password" name="password" class="form-control" placeholder="Enter your password" aria-label="password">
            </div>
            @error('password')
                <div class="text-danger col-10 offset-1 small"> {{ $message}} </div>
            @enderror
            <br>
            <div class="col-8 offset-1">
                <button class="btn btn-primary col-12 col-md-6 fs-5"><i class="bi bi-box-arrow-in-right"></i> Sign in</button>
            </div>
            <br>
            <div class="row">
                <div class="forgot-password col-5 offset-1 small">
                    <a href="{{ url('forgot')}}" alt="Register" class="text-primary">forgot password?</a>
                </div>
                <div class="col-3 offset-3">
                    <a href="{{ url('register')}}" alt="Register" class="text-primary">Register</a>
                </div>
            </div>
            <br>
        </form>
    </div>
@endsection