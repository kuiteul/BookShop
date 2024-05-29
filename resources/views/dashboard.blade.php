@extends('layout/template')


@section('title')

    Booshop | Home

@endsection


@section('header')
    @include('layout/header')
@endsection

@section('content')
    <div class="position-relative col-12">
        <main id="dashboard">
            <div id="card" class="">
                <form class="col-10 offset-1 col-sm-8 offset-sm-2 row" role="search">
                    <div class="col-8 offset-1">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" >
                    </div>
                    <button class="btn btn-outline-success col-2" type="submit"> <i class="bi bi-search"></i> Search</button>
                </form>
                      
                <h1 class="text-center"> Dive into the best online BookShop</h1>
                <hr>
            </div>
            
        </main>
    </div>
@endsection