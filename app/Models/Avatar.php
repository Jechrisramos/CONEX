<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    use HasFactory;

    public function getAvatars()
    {
       
        return Avatar::all();
    }

    function user(){
        return $this->hasMany('App\Models\User');
    }
}
