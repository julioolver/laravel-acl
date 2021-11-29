<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'slug', 'channel_id'];

    public function user()
    {
        // pertense a um usuário/tem um usuário
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class)->orderBy('created_at', 'DESC');
    }
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
