<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\GenreRepository;
use App\Http\Requests\GenreRequest;
use Auth;

class GenreController extends Controller
{

    protected $_genre;

    public function __construct(GenreRepository $genre)
    {
        $this->_genre = $genre;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        return view('Admin.genre.index', ['user' => $user, 'genre' => $this->_genre->getPaginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        return view('Admin.genre.create', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GenreRequest $request)
    {
        $user = Auth::user();

        return view('Admin.genre.store', ['user' => $user, 'genre' => $this->_genre->store($request->all())]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $user = Auth::user();

       return view('Admin.genre.show', ['user' => $user, 'genre' => $this->_genre->getGenre($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();

        return view('Admin.genre.edit', ['user' => $user, 'genre' => $this->_genre->getGenre($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GenreRequest $request, string $id)
    {
        $user = Auth::user();

        return view('Admin.genre.update', ['user' => $user, 'genre' => $this->_genre->update($request->all(), $id)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();

        return view('Admin.genre.delete', ['user' => $user, 'genre' => $this->_genre->delete($id)]);
    }
}
