<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $hidden = ['book_category_id','created_at','updated_at'];

    protected $fillable = [
        'book_category_id',
        'title',
        'author'
    ];

    public function book_category()
    {
        return $this->belongsTo(BookCategory::class);
    }
}
