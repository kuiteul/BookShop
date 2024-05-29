<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\BookRepository;
use App\Http\Requests\BookRequest;
use Auth;

class BookController extends Controller
{
    protected $_book;

    public function __construct(BookRepository $book)
    {
        $this->_book = $book;
    }
    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        return view('Admin.booK.index', ['user' => $user, 'book' => $this->_book->getPaginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('Admin.book.create', ['user' => $user]);
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
        return view("Admin.book.get", ["book" => $this->_book->getBook($id), "user" => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        return view('Admin.book.edit', ['user' => $user, 'book' => $this->_book->getBook($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, string $id)
    {
        $user = Auth::user();
        return view('Admin.book.update', ['user' => $user, 'book' => $this->_book->update($request->all(), $id)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return view('Admin.book.delete', ['book' => $this->_book->delete($id)]);
    }
}
