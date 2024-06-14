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
        <h1 class="text-center">Added to card</h1>
        
        <div class="text-center">The book has been added to your card</div>

        <div class="text-center"><a href="{{ url('/')}}"> Return </a></div>
        
    @endsection


    {{--  --}}
@else
    @section('title')
        BookShop | FORBIDEN
    @endsection
    <div style="margin-left: 2%">Unauthorized</div>

@endif