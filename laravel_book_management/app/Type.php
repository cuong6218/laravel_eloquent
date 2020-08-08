<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    function books(){
        return $this->hasMany(Book::class, 'type_id');
    }
}
