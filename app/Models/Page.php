<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    function ticket(){
        return $this->belongsTo('App\Models\Ticket');
    }

    function notes(){
        return $this->hasMany('App\Models\Note');
    }
}
