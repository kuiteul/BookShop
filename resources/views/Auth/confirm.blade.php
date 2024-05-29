@extends('layout/template')

@section('title')
    BookShop | Login Page
@endsection


@section('content')

    @if ($user)
        <h1 class="text-center fw-bold" id="welcome-login">You are ready to use our Bookshop</h1>
        <br><br>
        <div class="col-12 col-md-6 offset-md-3 p-4 border" id="register">
            <br>
            <h2 class="col-10 ">Sign up Successfull</h2>
            <br>
            <form class="row g-3 " class="col-12">
                <span class="text-success">Your account has been successfully created</span>
                <div class="col-12">
                    <a href="{{ url('login') }}" alt="Go back to login page">Return to login</a>
                </div>
            </form>
        
        </div>
         
    @else
        <h1 class="text-center text-warning fw-bold" id="welcome-login">SOMETHING WENT WRONG!</h1>
        <br><br>
        <div class="col-12 col-md-6 offset-md-3 p-4 border" id="register">
            <br>
            <h2 class="col-10 ">Sign up Failed</h2>
            <br>
            <form class="row g-3 " class="col-12">
                <span class="text-danger">An error occured when creating your account</span>
                <div class="col-12">
                    <a href="{{ url('login') }}" alt="Go back to login page">Return to login</a>
                </div>
            </form>
        
        </div>
    @endif
    
@endsection