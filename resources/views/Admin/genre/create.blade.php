@extends('layout/template')

@if ( $user->role == 'admin')
    @section('title')
        Admin Panel | Add new book
    @endsection

    @section('header')
        @include('layout/header')
    @endsection

    @section('content')
        <h1 class="text-capitalize text-center fw-1 admin-panel ">Administration page</h1>
       <div class="row border">
            <nav class="col-3 border">
                @include('layout/menu')
            </nav>

            <main class="col-md-7 offset-md-1 border">
                <div class="row col-12">
                    <div class="col-3 offset-9">
                        <a href=" {{url('admin/book') }}" alt="Add a book" class="col"><i class="bi bi-list-task"></i> List of books</a>
                    </div>
                    <h1 class="text-center text-capitalize col-8">Add a new book</h1>
                    <hr>
                </div>
                <div class="col-12">
                    <form class="row g-3" action=" {{url('admin/genre')}} " method="post" enctype="multipart/form-data" > 
                        @csrf
                        <input type="text" name="user_id_fk" value={{ Auth::user()->user_id }} hidden>
                        <div class="col-md-6">
                          <label for="inputEmail4" class="form-label">Genre name</label>
                          <input type="text" name="genre_name" placeholder="Science book" class="form-control" id="genre_name">
                          @error('genre_name')
                              <div class="text-danger small"> {{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-6">
                          <label for="inputAddress2" class="form-label">Description</label>
                            <input type="text" class="form-control" name="genre_description" id="genre_description" 
                            placeholder="Everything concerning Science...">
                            @error('genre_description')
                                <div class="text-danger small"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-floppy-fill"></i> Save Genre</button>
                          </div>
                      </form>
                </div>
                
               
            </main>
       </div>

    @endsection


    {{--  --}}
@else
    @section('title')
        BookShop | FORBIDEN
    @endsection
    <div style="margin-left: 2%">Unauthorized</div>

@endif