<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory; 

    function user(){
        return $this->belongsTo('App\Models\User');
    }

    function ticket_type(){
        return $this->belongsTo('App\Models\TicketType');
    }

    function notes(){
        return $this->hasMany('App\Models\Note');
    }

    function pages(){
        return $this->hasMany('App\Models\Page');
    }
}
