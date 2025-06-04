<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = ['title', 'synopsis', 'author_id', 'genre_id'];

    public function author()
    {
        return $this->belongsTo('App\Models\Author');
    }

    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }
}
