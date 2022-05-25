<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Song;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if( Auth::check() ) {
            return view('songs.index', ['title' => 'Álbumes']);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_song'=> 'required',
            'album_id'=> 'required',
        ]);
        $song = new Song;
        $song->title = $request->title_song;
        $song->album_id = $request->album_id;
        $song->path_video = $request->pathvideo;
        $song->path_stream1 = $request->pathstream1;
        $song->path_stream2 = $request->pathstream2;
        $song->save();
        return redirect()->route('albums_show', $request->album_id)->with('success', 'Se agregó la nueva canción de forma correcta.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        if( Auth::check() ) {
            $song = Song::get($id);
            if( $song ) {
                return response()->json([
                    'code'=> 200,
                    'msg'=> 'Ok',
                    'data'=> $song
                ]);
            } else {
                return response()->json([
                    'code'=> 404,
                    'msg'=> 'Resource not found',
                    'data'=> null
                ]);
            }
        } else {
            return response()->json([
                'code'=> 400,
                'msg'=> 'Bad request',
                'data'=> null
            ]);
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
    public function update(Request $request, $id){
        if( Auth::check() ) {
            $request->validate([
                'title_song'=> 'required',
            ]);
            $song_id = $id ? $id : $request->song_id;
            $song = Song::find($song_id);
            $song->title = $request->title_song;
            $song->path_video = $request->pathvideo;
            $song->path_stream1 = $request->pathstream1;
            $song->path_stream2 = $request->pathstream2;
            $song->save();
            return redirect()->back()->with('success', 'Se actualizaron los datos de la canción.');
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
    public function destroy(Request $request, $id){
        $song_id = $id ? $id : $request->song_id;
        $song = Song::find($song_id);
        $song->delete();
        return redirect()->back()->with('success', 'Se ha eliminado la canción.');
    }

    public function getSongs() {
        if( Auth::check() ) {
            $songs = Song::getAll();
            return response()->json([
                'code'=> 200,
                'msg'=> 'Ok',
                'data'=> $songs->toArray(),
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
