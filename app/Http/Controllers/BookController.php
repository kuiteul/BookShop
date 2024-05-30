<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\BookRepository;
use App\Http\Requests\BookRequest;
use App\Repository\GenreRepository;
use Auth;

class BookController extends Controller
{
    protected $_book;
    protected $_genre;

    public function __construct(BookRepository $book, GenreRepository $genre)
    {
        $this->_book = $book;
        $this->_genre = $genre;
    }
    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $book = $this->_book->getPaginate(20);

        return view('Admin.booK.index', ['user' => $user, 'book' => $book]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $genre = $this->_genre->getPaginate(20);
        return view('Admin.book.create', ['user' => $user, 'genre' => $genre]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $book = $this->_book->store($request->all());
        return view("Admin.book.store", ["book" => $book]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        $book = $this->_book->getBook($id);   
        return view("Admin.book.get", ["book" => $book, "user" => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $genre = $this->_genre->getPaginate(20);
        $book = $this->_book->getBook($id);
        return view('Admin.book.edit', ['user' => $user, 'book' => $book, 'genre' => $genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, string $book_id)
    {
        $user = Auth::user();
        return view('Admin.book.update', ['user' => $user, 'book' => $this->_book->update($request->all(), $book_id)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return view('Admin.book.delete', ['book' => $this->_book->delete($id)]);
    }
}
