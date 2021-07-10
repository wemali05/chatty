<?php

namespace App\Models;

use App\Models\User;
use App\Models\Discussion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reply extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function discussion()
    {
        return $this->belongsTo(Discussion::class);
    }
}
