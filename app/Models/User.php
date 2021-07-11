<?php

namespace App\Models;

use App\Models\Discussion;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
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
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function getGravatarAttribute()
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "https://s.gravatar.com/avatar/f09505f95b79007028567a0163507fd7?s=80/$hash";
    }
}
