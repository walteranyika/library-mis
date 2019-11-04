<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable=["student_id","activity_id","book_id"];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }


}
