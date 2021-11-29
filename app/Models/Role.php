<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'role'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function resources()
    {
        //muitos para muitos
        return $this->belongsToMany(Resource::class);
    }
}