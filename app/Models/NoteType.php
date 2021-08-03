<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteType extends Model
{
    use HasFactory;

    function notes(){
        return $this->hasMany('App\Models\Note');
    }
}
