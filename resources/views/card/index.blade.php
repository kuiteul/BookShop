@extends('layout/template')

@if ( $user->role == 'admin')
    @section('title')
        Admin Panel | Add new book
    @endsection

    @section('header')
        @include('layout/header')
    @endsection

    @section('content')
        <br><br><br><br>
        <h1 class="text-center">List of your card</h1>
        
        <div class="col-12 row offset-2">
                @foreach ($card as $item)
                        
                           <div class="col-6 col-md-2 border">
                                <div class="col-12 border row">
                                    <img class="col-12" src='{{ asset("storage/images/$item->image_name") }}' alt="">
                                </div>
                                <h2 class="text-center">
                                    {{ $item->book_title }}
                                </h2>
                                <div class="text-center">
                                    Price: XAF{{ $item->price }}
                                </div>
                                <br>
                                <div class="row">
                                    <form action="/order" method="post" class="col-12 col-md-6 description">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Remove it</button>
                                    </form>
                                    <form action="/card" method="post" class="col-12 col-md-6">
                                        @csrf
                                        <input type="text" name="book-id" hidden value="{{ $item->book_id }}" >
                                        <input type="text" name="user-id" hidden value="{{ Auth::user()->user_id }}">
                                        <button class="col-12 btn btn-primary">Order</button>
                                    </form>
                                </div>
                           </div>
                        
                @endforeach
            </div>
        <div class="text-center"><a href="{{ url('/')}}"> Return </a></div>
        
    @endsection


    {{--  --}}
@else
    @section('title')
        BookShop | FORBIDEN
    @endsection
    <div style="margin-left: 2%">Unauthorized</div>

@endif