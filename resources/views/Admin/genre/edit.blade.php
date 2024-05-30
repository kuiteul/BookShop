@extends('layout/template')

@if ( $user->role == 'admin')
    @section('title')
        Admin Panel | Add new genre
    @endsection

    @section('header')
        @include('layout/header')
    @endsection

    @section('content')
        <h1 class="text-capitalize text-center fw-1 admin-panel ">Administration panel</h1>
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
                    <form class="row g-3" action="/admin/genre/{{ $item->genre_id}}" method="post" enctype="multipart/form-data" > 
                        @csrf
                        @method('PATCH')
                        <input type="text" name="user_id_fk" value="{{ Auth::user()->user_id }}" hidden>
                        <input type="text" name="genre_id value="{{ $item->genre_id }}" hidden>
                        <div class="col-md-6">
                          <label for="inputEmail4" class="form-label">Genre name</label>
                          <input type="text" name="genre_name" value="{{$item->genre_name}}" placeholder="Science genre" 
                            class="form-control" id="genre_name">
                          @error('genre_name')
                              <div class="text-danger small"> {{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-6">
                          <label for="inputAddress2" class="form-label">Description</label>
                            <input type="text" name="genre_description" id="genre_description" value="{{$item->genre_description}}"
                                placeholder="Everything concerning Science..." class="form-control">
                            @error('genre_description')
                                <div class="text-danger small"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-repeat"></i> Update</button>
                        </div>
                    </form>
                @endforeach
                    
                </div>
                
               
            </main>
       </div>

    @endsection


    {{--  --}}
@else
    @section('title')
        genreShop | FORBIDEN
    @endsection
    <div style="margin-left: 2%">Unauthorized</div>

@endif