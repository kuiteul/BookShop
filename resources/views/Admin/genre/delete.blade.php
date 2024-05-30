@extends('layout/template')

@section('title')
    genreShop | Login Page
@endsection


@section('content')

    @if ($genre)
        <h1 class="text-center fw-bold" id="welcome-login">Administration panel</h1>
        <br><br>
        <div class="col-12 col-md-6 offset-md-3 p-4 border" id="register">
            <br>
            <h2 class="col-10 ">Deleting genre successfull</h2>
            <br>
            <form class="row g-3 " class="col-12">
                <span class="text-success">The genre has been deleted successfully</span>
                <div class="col-6">
                    <a href="{{ url('admin/genre') }}" alt="Go back to list"><i class="bi bi-list-task"></i> Return to list</a>
                </div>
                <div class="col-6">
                    <a href="{{ url('admin/genre/create') }}" alt="Add a new genre"><i class="bi bi-plus-circle"></i> Add another</a>
                </div>
            </form>
        
        </div>
         
    @else
        <h1 class="text-center text-warning fw-bold" id="welcome-login">SOMETHING WENT WRONG!</h1>
        <br><br>
        <div class="col-12 col-md-6 offset-md-3 p-4 border" id="register">
            <br>
            <h2 class="col-10 ">Deleting genre Failed</h2>
            <br>
            <form class="row g-3 " class="col-12">
                <span class="text-danger">An error occured when delteting this genre</span>
                <div class="col-12">
                    <a href="{{ url('admin/genre') }}" alt="Go back to genre list"><i class="bi bi-list-task"></i> Return to list</a>
                </div>
            </form>
        
        </div>
    @endif
    
@endsection