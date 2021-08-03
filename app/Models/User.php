<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employeeId',
        'name',
        'email',
        'role',
        'avatar_id',
        'role_id',
        'supervisor',
        'employment_status_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    function avatar(){
        return $this->belongsTo('App\Models\Avatar');
    }

    function tickets(){
        return $this->hasMany('App\Models\Ticket');
    }

    function notes(){
        return $this->hasMany('App\Models\Note');
    }

    function role(){
        return $this->belongsTo('App\Models\Role');
    }

    function employmentStatus(){
        return $this->belongsTo('App\Models\EmploymentStatus');
    }

    public function supervisors(){
        return $this->belongsTo(User::class, 'supervisor');
    }

    public function members(){
        return $this->belongsTo(User::class, 'supervisor')->with('supervisor');
    }

}
