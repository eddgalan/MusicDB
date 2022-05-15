<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Artist;

class ArtistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( Auth::check() ) {
            return view('artists.index', ['title' => 'Artistas registrados']);
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
            'name'=> 'required',
            'img'=> 'required',
        ]);
        $artist = new Artist;
        $artist->name = $request->name;
        $artist->lastname = $request->lastname;
        $artist->alias = $request->alias;
        $artist->description = $request->description;
        $artist->website = $request->web_site;
        $artist->pathimg = '';
        $artist->save();
        $pathimg = $request->file('img')->store('public/artists/'. strval($artist->id));
        $artist->pathimg = $pathimg;
        $artist->save();
        return redirect()->route('artists')->with('success', 'Se agregó el nuevo artista correctamente.');
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

    public function getArtists(){
        if( Auth::check() ) {
            $artists = Artist::all();
            return response()->json([
                'code'=> 200,
                'msg'=> 'Ok',
                'data'=> $artists->toArray(),
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
