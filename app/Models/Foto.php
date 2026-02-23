<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;

    public function likesRecibidos()
    {
        return $this->belongsToMany(User::class, 'foto_user');
    }

    protected $fillable = [
        'url',
        'user_id',
    ];
}
