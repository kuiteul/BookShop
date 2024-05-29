@extends('layout/template')

@section('title')
    BookShop | Login Page
@endsection


@section('content')

    @if ($book)
        <h1 class="text-center fw-bold" id="welcome-login">Administration panel</h1>
        <br><br>
        <div class="col-12 col-md-6 offset-md-3 p-4 border" id="register">
            <br>
            <h2 class="col-10 ">Updating book successfull</h2>
            <br>
            <form class="row g-3 " class="col-12">
                <span class="text-success">The book has been updated successfully</span>
                <div class="col-6">
                    <a href="{{ url('admin/book') }}" alt="Go back to list"><i class="bi bi-list-task"></i> Return to list</a>
                </div>
                <div class="col-6">
                    <a href="{{ url('admin/book/create') }}" alt="Add a new book"><i class="bi bi-plus-circle"></i> Add another</a>
                </div>
            </form>
        
        </div>
         
    @else
        <h1 class="text-center text-warning fw-bold" id="welcome-login">SOMETHING WENT WRONG!</h1>
        <br><br>
        <div class="col-12 col-md-6 offset-md-3 p-4 border" id="register">
            <br>
            <h2 class="col-10 ">Deleting book Failed</h2>
            <br>
            <form class="row g-3 " class="col-12">
                <span class="text-danger">An error occured when updating this book</span>
                <div class="col-12">
                    <a href="{{ url('admin/book') }}" alt="Go back to book list"><i class="bi bi-list-task"></i> Return to list</a>
                </div>
            </form>
        
        </div>
    @endif
    
@endsection