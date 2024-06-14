<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\BookRepository;
use App\Repository\ImageRepository;
use App\Http\Requests\BookRequest;
use App\Repository\GenreRepository;
use App\Http\Manager\FileManager;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use File;
use Auth;

class BookController extends Controller
{
    protected $_book;
    protected $_genre;
    protected $_image;

    public function __construct(BookRepository $book, GenreRepository $genre, ImageRepository $image)
    {
        $this->_book = $book;
        $this->_genre = $genre;
        $this->_image = $image;
    }
    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $book = $this->_book->getPaginate(20);

        return view('Admin.booK.index', ['user' => $user, 'book' => $book, 'test' => $this->_image->getImage("9c4697fe-a1dc-48a3-967e-8dca22e5f2b4")]);
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
       
        
        $image = $request->file('image');
        if($image->isValid())
        {
            $path = config('images.path');
            $image->getClientOriginalExtension();
            $name = $request->image->store($path, 'images');

            $book = $this->_book->store($request->all());
            $retrieve_book_id = $this->_book->getBookId($request['book_title']);
            $book_id = "";
            foreach($retrieve_book_id as $item)
            {
                $book_id = $item;
            }
            $array_image = [
                "image-name" => $name,
                "book-id" => $book_id['book_id']
            ];
            $this->_image->store($array_image);
        }
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
     * Display the specified to user
     */
    public function showBookForCard(string $book_id)
    {
        $user = Auth::user();
        $book = $this->_book->getBook($book_id);
        return view("book.show", ["book" => $book, "user" => $user]);
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
        $image_name = $this->_image->getImage($id);
        
        File::Delete('/storage/images/'.$image_name);

        return view('Admin.book.delete', ['book' => $this->_book->delete($id)]);
    }
}
