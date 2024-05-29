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
                    <form class="row g-3" action=" {{url('admin/book')}} " method="post" enctype="multipart/form-data" > 
                        @csrf
                        <input type="text" name="user_id_fk" value={{ Auth::user()->user_id }} hidden>
                        <div class="col-md-6">
                          <label for="inputEmail4" class="form-label">Boot title</label>
                          <input type="text" name="book_title" placeholder="Harry potter" class="form-control" id="inputEmail4">
                          @error('book_title')
                              <div class="text-danger small"> {{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-6">
                          <label for="inputPassword4" class="form-label">Book author</label>
                          <input type="text" name="author" placeholder="James bond" class="form-control" id="inputPassword4">
                          @error('author')
                              <div class="text-danger small"> {{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-6">
                          <label for="inputAddress" class="form-label">Price</label>
                          <input type="number" name="price" placeholder="1500 XAF" class="form-control" id="inputPassword4">
                          @error('price')
                              <div class="text-danger small"> {{ $message }}</div>
                          @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Select genre</label>
                            <select id="inputGenre" class="form-select" name="genre-id" >
                              <option disabled selected>Choose...</option>
                              <option value="Art">Art</option>
                            </select>
                            @error('genre')
                              <div class="text-danger small"> {{ $message }}</div>
                            @enderror
                          </div>
                        <div class="col-12">
                          <label for="inputAddress2" class="form-label">Description</label>
                          <textarea class="form-control" name="description" placeholder="Enter a brief description here"></textarea>
                          
                            @error('description')
                                <div class="text-danger small"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="inputAddress2" class="form-label">Select a photo </label>
                            <input type="file" name="image-name" id="">
                        </div>
                        
                        <div class="col-12">
                          <button type="submit" class="btn btn-primary"><i class="bi bi-floppy-fill"></i> Save book</button>
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