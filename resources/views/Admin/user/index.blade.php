@extends('layout/template')

@if ( $user->role == 'admin')
    @section('title')
        Admin Panel | User Administration
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

            <main class="col-md-6 offset-md-1 border">
                <div class="row">
                    <h1 class="text-center text-capitalize col-12">list of users</h1>
                </div>

                <table class="table border">
                    <thead>
                        <td colspan="6" class="text-center">users present in the database</td>
                        <td> <a href=" {{url('admin/user/create') }}" alt="Add a book"><i class="bi bi-lock-fill"></i> Reset password</a></td>
                    </thead>
                    <tbody>
                        <tr>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Country</th>
                            <th colspan="2">is ban ?</th>
                        </tr>
                        @if($user->isEmpty())
                            <tr>                     
                                <td colspan="7" class="text-center text-warning fs-2"> No user in the database </td>
                            </tr>
                        @else
                            @foreach ($user as $item)
                                <tr onclick="document.location.href='/admin/user/{{ $item->user_id }}'" class="cursor">
                                    <td> {{ $item->uf_name }} </td>
                                    <td> {{ $item->l_name }} </td>
                                    <td> {{ $item->email}} </td>
                                    <td> {{ $item->telephone}} </td>
                                    <td> {{ $item->country }} </td>
                                    <td> {{ $item->isBan }} </td>
                                    <td> <a href="{{ url('admin/user/ban')}}">Ban user</a></td>
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


    {{-- Unauthorize for people who are not admin --}}
@else
    @section('title')
        BookShop | FORBIDEN
    @endsection
    <div style="margin-left: 2%">Unauthorized</div>

@endif