<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['description'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

}
