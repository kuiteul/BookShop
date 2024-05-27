@extends('layout/template')

@section('title')

    Booshop | Home

@endsection

@section('content')
{{ $user->first_name }}
    <h1 class="text-center"> Bienvenu dans le Booshop store</h1>
    <hr>
@endsection