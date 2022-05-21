<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Artist;
use App\Models\Album;
use App\Models\Song;

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
            $songs = $request->songs;
            foreach($songs as $song) {
                Song::store($song, $album->id);
            }
            $request->session()->put('success', 'Se agregó el álbum correctamente');
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
        if( Auth::check() ) {
            $album = Album::getAlbum($id);
            return view('albums.show', ['title' => 'Álbum', 'album'=> $album]);
        } else {
            return redirect('/home');
        }
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
        if( Auth::check() ) {
            $request->validate([
                'title'=> 'required',
                'date'=> 'required',
                'genre'=> 'required',
            ]);
            $album = Album::find($id);
            $album->title = $request->title;
            $album->date = $request->date;
            $album->genre = $request->genre;
            $album->description = $request->description;
            $album->pathimg = '---';
            $album->save();
            return redirect()->route('albums_show', $id)->with('success', 'Se actualizó el álbum de forma correcta.');
        } else {
            return redirect('/home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $album_id = $id ? $id : $request->id;
        $album = Album::find($album_id);
        $album->delete();
        return redirect()->route('album')->with('success', 'Se ha eliminado el álbum.');
    }

    public function getAlbums(){
        if( Auth::check() ) {
            $albums = Album::getAll();
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
