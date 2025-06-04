<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Model\Review;
class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $fillable = ['name', 'email', 'password'];

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

}
