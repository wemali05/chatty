<?php

namespace App\Models;

use App\Models\User;
use App\Models\Reply;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discussion extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function bestReply()
    {
        return $this->belongsTo(Reply::class, 'reply_id');
    }

    public function markBestAnswer(Reply $reply)
    {
        $this->update([
            'reply_id' => $reply->id
        ]);
    }
}
