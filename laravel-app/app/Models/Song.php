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

}
