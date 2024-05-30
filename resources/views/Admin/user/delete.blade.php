@extends('layout/template')

@section('title')
    usersShop | Login Page
@endsection


@section('content')

    @if ($users)
        <h1 class="text-center fw-bold" id="welcome-login">Administration panel</h1>
        <br><br>
        <div class="col-12 col-md-6 offset-md-3 p-4 border" id="register">
            <br>
            <h2 class="col-10 ">Deleting users successfull</h2>
            <br>
            <form class="row g-3 " class="col-12">
                <span class="text-success">The users has been deleted successfully</span>
                <div class="col-6">
                    <a href="{{ url('admin/users') }}" alt="Go back to list"><i class="bi bi-list-task"></i> Return to list</a>
                </div>
            </form>
        
        </div>
         
    @else
        <h1 class="text-center text-warning fw-bold" id="welcome-login">SOMETHING WENT WRONG!</h1>
        <br><br>
        <div class="col-12 col-md-6 offset-md-3 p-4 border" id="register">
            <br>
            <h2 class="col-10 ">Deleting users Failed</h2>
            <br>
            <form class="row g-3 " class="col-12">
                <span class="text-danger">An error occured when delteting this users</span>
                <div class="col-12">
                    <a href="{{ url('admin/users') }}" alt="Go back to users list"><i class="bi bi-list-task"></i> Return to list</a>
                </div>
            </form>
        
        </div>
    @endif
    
@endsection