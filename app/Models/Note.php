<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //to import the migrated soft delete
use OwenIt\Auditing\Contracts\Auditable;

class Note extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    function user(){
        return $this->belongsTo('App\Models\User');
    }

    function ticket(){
        return $this->belongsTo('App\Models\Ticket');
    }

    function noteType(){
        return $this->belongsTo('App\Models\NoteType');
    }

    function page(){
        return $this->belongsTo('App\Models\Page');
    }

    // function audits(){
    //     return $this->hasMany('App\Models\Audit');
    // }

}
