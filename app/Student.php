<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=["school_id","name","gender","dob"];

    protected $casts = [
        'dob' => 'datetime',
    ];

    public function activities()
    {
       return $this->hasMany(Activity::class);
    }

    public function school()
    {
      return $this->belongsTo(School::class);
    }
}
