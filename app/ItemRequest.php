<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemRequest extends Model
{
    protected $fillable=["title","status","total_requests"];
}
