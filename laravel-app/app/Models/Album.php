<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = "albums";
    protected $fillable = ['id', 'title', 'artist_id', 'date', 'genre', 'description', 'pathimg'];

    public function getAlbum($id) {
        $album = Album::select('albums.id', 'albums.title', 'albums.artist_id',
            'artists.name', 'artists.lastname', 'artists.alias',
            'albums.date','albums.genre', 'albums.description', 'albums.pathimg')
            ->join('artists', 'albums.artist_id', '=', 'artists.id')
            ->where('albums.id', '=', $id)
            ->get();
        return $album[0];
    }

    public function getAlbumsByArtist($artistId) {
        $albums = Album::select('albums.id', 'albums.title', 'albums.artist_id',
            'artists.name', 'artists.lastname', 'artists.alias',
            'albums.date','albums.genre', 'albums.description', 'albums.pathimg')
            ->join('artists', 'albums.artist_id', '=', 'artists.id')
            ->where('albums.artist_id', '=', $artistId)
            ->get();
        return $albums;
    }

    public function getAll() {
        return Album::select('albums.id', 'albums.title', 'albums.artist_id',
            'artists.name', 'artists.lastname', 'artists.alias',
            'albums.date','albums.genre', 'albums.description', 'albums.pathimg')
            ->join('artists', 'albums.artist_id', '=', 'artists.id')
            ->get();
    }

    public function getById($id) {
        return Album::find($id);
    }
}
