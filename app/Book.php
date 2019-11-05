<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ["title", "author", "year", "isbn","quantity"];

    public function transactions()
    {
       return $this->hasMany(Transaction::class);
    }
}
