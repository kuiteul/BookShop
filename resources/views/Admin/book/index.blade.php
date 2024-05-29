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
                    <h1 class="text-center text-capitalize col-12">list of books</h1>
                </div>

                <table class="table border">
                    <thead>
                        <td colspan="4" class="text-center">Books present in the database</td>
                        <td> <a href=" {{url('admin/book/create') }}" alt="Add a book"><i class="bi bi-plus-circle"></i> New book</a></td>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Title</th>
                            <th>Descritpion</th>
                            <th>Author</th>
                            <th>Price</th>
                            <th>Genre</th>
                        </tr>
                        @if (empty($book))
                            <tr>
                                <td colspan="5" class="text-center text-warning fs-2"> No book in the database </td>
                            </tr>
                        @else
                            @foreach ($book as $item)
                                <tr onclick="document.location.href='/admin/book/{{ $item->book_id }}'" class="cursor">
                                    <td> {{ $item->book_title }} </td>
                                    <td> {{ $item->description }} </td>
                                    <td> {{ $item->author }} </td>
                                    <td> XAF{{ $item->price }} </td>
                                    <td> {{ $item->genre_id }} </td>
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