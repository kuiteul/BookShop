@extends('layout/template')

@if ( $user->role == 'admin')
    @section('title')
        BookShop | Admin Panel
    @endsection

    @section('header')
        @include('layout/header')
    @endsection

    @section('content')
            @include('layout/menu')
    @endsection
@else
    @section('title')
        BookShop | FORBIDEN
    @endsection
    <div style="margin-left: 2%">Unauthorized</div>
@endif