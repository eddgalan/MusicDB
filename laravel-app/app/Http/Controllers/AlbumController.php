<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Artist;
use App\Models\Album;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( Auth::check() ) {
            return view('albums.index', ['title' => 'Álbumes']);
        } else {
            return redirect('/home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( Auth::check() ) {
            $artists = Artist::all();
            return view('albums.create', ['title' => 'Agregar nuevo álbum', 'artists'=> $artists]);
        } else {
            return redirect('/home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( Auth::check() ) {
            $request->validate([
                'title'=> 'required',
                'artist'=> 'required',
                'date'=> 'required',
                'genre'=> 'required',
            ]);
            $album = new Album;
            $album->title = $request->title;
            $album->artist_id = $request->artist;
            $album->date = $request->date;
            $album->genre = $request->genre;
            $album->description = $request->description;
            $album->pathimg = '---';
            $album->save();

            return response()->json([
                'code'=> 201,
                'msg'=> 'Ok. Se registró de forma correcta el álbum',
                'data'=> '',
            ]);
        } else {
            return redirect('/home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAlbums(){
        if( Auth::check() ) {
            $albums = Album::select('albums.id', 'albums.title', 'albums.artist_id',
                'artists.name', 'artists.lastname', 'artists.alias',
                'albums.date','albums.genre', 'albums.description', 'albums.pathimg')
                ->join('artists', 'albums.artist_id', '=', 'artists.id')
                ->get();
            return response()->json([
                'code'=> 200,
                'msg'=> 'Ok',
                'data'=> $albums->toArray(),
            ]);
        } else {
            return response()->json([
                'code'=> 400,
                'msg'=> 'Bad request',
                'data'=> null
            ]);
        }
    }
}
