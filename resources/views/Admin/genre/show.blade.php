@extends('layout/template')

@if ( $user->role == 'admin')
    @section('title')
        Admin Panel | Add new genre
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
                        <a href=" {{url('admin/genre') }}" alt="Add a genre" class="col"><i class="bi bi-list-task"></i> List of genres</a>
                    </div>
                    <h1 class="text-center text-capitalize col-8">Add a new genre</h1>
                    <hr>
                </div>
                <div class="col-12">
                    @foreach ($genre as $item)
                        <form class="row g-3">
                            @csrf
                            <input type="text" name="user_id_fk" value={{ Auth::user()->user_id }} hidden>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Genre name</label>
                                <input type="text" name="genre_name" disabled value="{{ $item->genre_name }}" class="form-control" id="inputEmail4">
                            @error('genre_name')
                                <div class="text-danger small"> {{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress2" class="form-label">Description</label>
                                <textarea class="form-control" name="description" disabled>{{ $item->genre_description }}</textarea>
                                
                                    @error('description')
                                        <div class="text-danger small"> {{ $message }}</div>
                                    @enderror
                            </div>
                        
                        </form>
                        <br>
                        <div class="col-12 col-md-10 offset-md-1 row">
                            <form action=" /admin/genre/{{ $item->genre_id}}/edit " method="post" class="col-6">
                                @csrf
                                @method('GET')
                                <div class="col-md-6 border">
                                    <button type="submit" class="btn btn-primary col-12"><i class="bi bi-pencil-square"></i> Edit genre</button>
                                </div>
                            </form>
                         
                            <form action="/admin/genre/{{ $item->genre_id}}" method="post" class="col-6">
                                @csrf
                                @method('DELETE')
                                <div class="col-md-6 border">
                                    <button type="submit" class="btn btn-danger col-12"><i class="bi bi-trash3"></i> Delete genre</button>
                                </div>
                            </form>
                            
                        </div>
                        @endforeach
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