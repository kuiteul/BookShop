@extends('layout/template')

@section('title')
    BookShop | Login Page
@endsection


@section('content')

    <h1 class="text-center fw-bold" id="welcome-login">Ready to use our bookshop?</h1>
    <br><br>

    <div class="col-12 col-md-6 offset-md-3 p-4 border" id="register">
        <br>
        <h2 class="col-10 ">Sign up for free account</h2>
        <br>
        <form class="row g-3 " action="{{ url('register') }}" method="post">
            @csrf
            <div class="col-md-6 col-12">
                <label for="first-name" class="form-label">First name</label>
                <input type="text" class="form-control" placeholder="First name" id="f-name" name="first-name">
                @error('first-name')
                    <div class="text-danger small col-md-12 col-12"> {{ $message }} </div>
                @enderror
            </div>
            <div class="col-md-6 col-12">
                <label for="last-name" class="form-label">Last name</label>
                <input type="text" class="form-control" placeholder="Last name" id="l-name" name="last-name">
                @error('last-name')
                    <div class="text-danger small col-md-12 col-12"> {{ $message }} </div>
                @enderror
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="test@example.com" name="email">
                @error('email')
                    <div class="text-danger small col-md-12 col-12"> {{ $message }} </div>
                @enderror
            </div>
            <div class="col-md-6 col-12">
                <label for="inputAddress2" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                @error('password')
                    <div class="text-danger small col-md-12 col-12"> {{ $message }} </div>
                @enderror
            </div>
            <div class="col-md-6 col-12">
                <label for="inputAddress2" class="form-label">Check password</label>
                <input type="password" class="form-control" id="password" name="check-password" placeholder="Enter your password">
                @error('check-password')
                    <div class="text-danger small col-md-12 col-12"> {{ $message }} </div>
                @enderror
            </div>
            <div class="col-md-4 col-12">
                <label for="inputState" class="form-label">Country</label>
                <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
                @error('country')
                    <div class="text-danger small col-md-12 col-12"> {{ $message }} </div>
                @enderror
            </div>
            <div class="col-md-6 col-12">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" id="inputCity">
                @error('city')
                    <div class="text-danger small col-md-12 col-12"> {{ $message }} </div>
                @enderror
            </div>
            <div class="col-md-2">
            <label for="inputZip" class="form-label">Zip</label>
            <input type="text" class="form-control" id="inputZip">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                    Check me out
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
            <div class="offset-11">
                <a href="{{ url('login')}}" alt="Login" class="text-primary">Login</a>
            </div>
        </form>
    
    </div>
@endsection