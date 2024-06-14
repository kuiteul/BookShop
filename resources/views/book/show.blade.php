@extends('layout/template')

@section('title')
    BookShop | Home
@endsection

@section('header')
    @include('layout/header')
@endsection

@section('content')
    <br><br>
    <h1 class="text-center">WELCOME TO OUR BOOSHOP</h1>
    <br><br>
    <form class="form-inline my-2 my-lg-0 col-10 offset-1 col-md-8 offset-md-4 row">
        <div class="col-8">
            <input class="form-control mr-sm-2" type="search" placeholder="Search">
        </div>
        <div class="col-3">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </div>
        
    </form>

    <br><br>
    <div class="row">
        <div class="col-md-3 border">
            <h2 class="text-left font-weight-bold text-capitalize" style="margin-left: 5%"> filter </h2>
            <hr>
            <div class="col-12 row">
                <div class="form-check col-10 offset-1">
                    <input class="form-check-input" type="checkbox" value="" id="litterature">
                    <label class="form-check-label" for="litterature">
                        Litterature
                    </label>
                    </div>
                    <br>
                    <div class="form-check col-10 offset-1">
                    <input class="form-check-input" type="checkbox" value="" id="science">
                    <label class="form-check-label" for="science">
                        Science
                    </label>
                    </div>
                    <div class="form-check col-10 offset-1">
                    <input class="form-check-input" type="checkbox" value="" id="fiction">
                    <label class="form-check-label" for="fiction">
                        Fiction
                    </label>
                    </div>
                    <div class="form-check col-10 offset-1">
                    <input class="form-check-input" type="checkbox" value="" id="drama">
                    <label class="form-check-label" for="drama">
                        Drama
                    </label>
                    </div>
            </div>
        </div>
         {{-- 
            Displaying litterature block 
            
            --}}
        <div class="col-8 d-flex justify-content-around row g-3" id="litterature">
            <h2 class="text-capitalize text-left" style="margin-left: 10%;"></h2>
            @foreach ($book as $item)

                @if ($item->genre_name == "Litterature")
                    
                        <div class="col-6 col-md-2 book-block">
                            <a href="{{ url("/book/$item->book_id")}}" alt=""> 
                                <div class="col-12">
                                        <img class="book-shop" src='{{ asset("storage/images/$item->image_name") }}' alt="">
                                    </div>
                                <h2 class="text-center">
                                    {{ $item->book_title }} 
                                </h2>
                                <div class="text-center">
                                    Of: {{ $item->author}}
                                </div>
                                <div class="text-center">
                                    Price: XAF{{ $item->price }}
                                </div>
                            </a>
                        </div>
                    
                @endif
                    
            @endforeach
        </div>
   
    </div>
    <br>
@endsection
