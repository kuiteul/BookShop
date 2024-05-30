@extends('layout/template')

@if ( $user->role == 'admin')
    @section('title')
        Admin Panel | Add new user
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
                        <a href=" {{url('admin/user') }}" alt="Add a user" class="col"><i class="bi bi-list-task"></i> List of users</a>
                    </div>
                    <h1 class="text-center text-capitalize col-8">Add a new user</h1>
                    <hr>
                </div>
                <div class="col-12">
                    @foreach ($user as $item)
                        <form class="row g-3" action=" {{url('admin/user')}} " method="post">
                            @csrf
                            <input type="text" name="user_id_fk" value={{ Auth::user()->user_id }} hidden>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Boot title</label>
                                <input type="text" name="user_title" disabled value="{{ $item->user_title }}" class="form-control" id="inputEmail4">
                            @error('user_title')
                                <div class="text-danger small"> {{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">user author</label>
                                <input type="text" name="author" disabled value="{{ $item->author}}" class="form-control" id="inputPassword4">
                            @error('author')
                                <div class="text-danger small"> {{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Price</label>
                                <input type="text" name="price" disabled value="{{ $item->price }}" class="form-control" id="inputPassword4">
                            </div>
                            <div class="col-md-6">
                                <label for="inputState" class="form-label">Select genre</label>
                                    <select id="inputGenre" class="form-select" name="genre-id" >
                                        <option disabled selected>{{$item->genre_name}}</option>
                                    </select>
                                @error('genre')
                                <div class="text-danger small"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="inputAddress2" class="form-label">Description</label>
                                <textarea class="form-control" name="description" disabled>{{ $item->description }}</textarea>
                                
                                    @error('description')
                                        <div class="text-danger small"> {{ $message }}</div>
                                    @enderror
                            </div>
                        
                        </form>
                        <br>
                        <div class="col-12 col-md-8 offset-md-2 row">
                            <form action=" /admin/user/ban " method="post" class="col-6">
                                @csrf
                                <input type="text" value="{{ $item->user_id }}" hidden name="user_id">
                                <div class="col-md-6 border">
                                    <button type="submit" class="btn btn-primary col-12"><i class="bi bi-ban-fill"></i> Ban user</button>
                                </div>
                            </form>
                         
                            <form action="/admin/user/{{ $item->user_id}}" method="post" class="col-6">
                                @csrf
                                @method('DELETE')
                                <div class="col-md-6 border">
                                    <button type="submit" class="btn btn-danger col-12"><i class="bi bi-trash3"></i> Delete user</button>
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
        userShop | FORBIDEN
    @endsection
    <div style="margin-left: 2%">Unauthorized</div>

@endif