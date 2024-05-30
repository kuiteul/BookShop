@extends('layout/template')

@if ( $user->role == 'admin')
    @section('title')
        Admin Panel | Book Administration
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

            <main class="col-md-6 offset-md-1 border">
                <div class="row">
                    <h1 class="text-center text-capitalize col-12">list of Genres of books</h1>
                </div>

                <table class="table border">
                    <thead>
                        <td colspan="4" class="text-center">Genre of book present in the database</td>
                        <td> <a href=" {{url('admin/genre/create') }}" alt="Add a book"><i class="bi bi-plus-circle"></i> New genre</a></td>
                    </thead>
                    <tbody>
                        <tr>
                            <th colspan="2">Genre name</th>
                            <th colspan="3">Descritpion</th>
                        </tr>
                        @if($genre->isEmpty())
                            <tr>                     
                                <td colspan="2" class="text-center text-warning fs-2"> No genre in the database </td>
                            </tr>
                        @else
                            @foreach ($genre as $item)
                                <tr onclick="document.location.href='/admin/genre/{{ $item->genre_id }}'" class="cursor">
                                    <td colspan="2"> {{ $item->genre_name }} </td>
                                    <td colspan="3"> {{ $item->genre_description }} </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <td colspan="5" class="text-center small">Genereted at <?= now() ?></td>
                    </tfoot>
                </table>
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