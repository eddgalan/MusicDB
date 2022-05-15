<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $table = "artists";
    protected $fillable = ['id', 'name', 'lastname', 'alias', 'description', 'pathimg', 'website'];
    // protected $hidden = ['id'];

    public function getAll(){
        return Artist::all();
    }

    public function getById($id) {
        return Artist::find($id);
    }

}
