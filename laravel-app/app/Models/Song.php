<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $table = "songs";
    protected $fillable = ['id', 'title', 'album_id', 'path_video', 'path_stram1', 'path_stream2'];

    public function store($song_data, $album) {
        $song = new Song;
        $song->title = $song_data['title'];
        $song->album_id = $album;
        $song->path_video = $song_data['pathvideo'];
        $song->path_stream1 = $song_data['pathstream1'];
        $song->path_stream2 = $song_data['pathstream2'];
        $song->save();
        return $song;
    }

    public function get($id) {
        return Song::find($id);
    }

    public function getAll() {
        $songs = Song::select('songs.id', 'songs.title', 'songs.album_id', 'albums.title AS album_name',
            'artists.alias AS artist',
            'songs.path_video', 'songs.path_stream1', 'songs.path_stream2')
            ->join('albums', 'albums.id', '=', 'songs.album_id')
            ->join('artists', 'artists.id', '=', 'albums.artist_id')
            ->get();
        return $songs;
    }

    public function getByAlbum($albumId) {
        $songs = Song::select('songs.id', 'songs.title', 'songs.album_id', 'albums.title AS album_title',
            'songs.path_video', 'songs.path_stream1', 'songs.path_stream2')
            ->join('albums', 'songs.album_id', '=', 'albums.id')
            ->where('albums.id', '=', $albumId)
            ->get();
        return $songs;
    }

}
