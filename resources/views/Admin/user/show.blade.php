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
                        <a href="{{ url('/admin/user') }}" alt="List of users" class="col"><i class="bi bi-list-task"></i> List of users</a>
                    </div>
                    
                    <hr>
                </div>
                <div class="col-12">
                    @foreach ($users as $item)
                        <form class="row g-3">
                            <input type="text" name="user_id_fk" value={{ Auth::user()->user_id }} hidden>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">First name</label>
                                <input type="text" name="f_name" placeholder="Enter your first name" disabled value="{{ $item->f_name }}" class="form-control" id="inputEmail4">
                            @error('f_name')
                                <div class="text-danger small"> {{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Last name</label>
                                <input type="text" name="l_name" placeholder="Enter your last name" disabled value="{{ $item->l_name }}" class="form-control" id="inputPassword4">
                            @error('l_name')
                                <div class="text-danger small"> {{ $message }}</div>
                            @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Email</label>
                                <input type="email" name="email" placeholder="Enter your email" disabled value="{{ $item->email }}" class="form-control" id="inputPassword4">
                            </div>
                            @error('email')
                                <div class="text-danger small"> {{ $message }}</div>
                            @enderror
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Telephone</label>
                                <input type="tel" name="telephone" placeholder="Enter your telephone" disabled value="{{ $item->telephone }}" class="form-control" id="inputPassword4">
                            </div>
                            @error('telephone')
                                <div class="text-danger small"> {{ $message }}</div>
                            @enderror
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Country</label>
                                <input type="text" name="country" placeholder="Enter your country" disabled value="{{ $item->country }}" class="form-control" id="inputPassword4">
                            </div>
                            @error('country')
                                <div class="text-danger small"> {{ $message }}</div>
                            @enderror
                            <div class="col-md-6">
                                <label for="inputAddress" class="form-label">Is Ban?</label>
                                <input type="text" name="is_ban" disabled value="{{ $item->isBan }}" class="form-control" id="inputPassword4">
                            </div>
                            <form action="/admin/user/{{ $item->user_id}}" method="post"></form>
                            @error('is_ban')
                                <div class="text-danger small"> {{ $message }}</div>
                            @enderror
                                               
                        </form>
                        <br>
                        <div class="col-12 col-md-8 offset-md-2 row">
                            <form action=" /admin/user/{{ $item->user_id }} " method="post" class="col-6">
                                @csrf
                                <input type="text" value="{{ $item->user_id }}" hidden name="user_id">
                                <div class="col-md-6 border">
                                    <button type="submit" class="btn btn-primary col-12"><i class="bi bi-ban-fill"></i> Ban user</button>
                                </div>
                            </form>

                            <form action="/admin/user/{{ $item->user_id }}/edit">
                                @csrf
                                <input type="text" value="{{ $item->user_id }}" hidden name="user_id">
                                <div class="col-md-6 border">
                                    <button type="submit" class="btn btn-primary col-12"><i class="bi bi-ban-fill"></i> Edit user</button>
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
        UserShop | FORBIDEN
    @endsection
    <div style="margin-left: 2%">Unauthorized</div>

@endif