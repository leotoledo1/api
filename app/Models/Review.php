<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = ['nota', 'text'];

    public function user()
    {
        return $this->belongsTo('App\Models\Usuario');
    }

    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }

}
