<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    //
    protected $table = 'books';

    public function author()
    {
        return $this->belongsTo('App\Author');
    }
}
