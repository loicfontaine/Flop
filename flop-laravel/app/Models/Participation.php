<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{

    public $timestamps = false;
    use HasFactory;




    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }

    public function rewards()
    {
        return $this->hasMany(Reward::class);
    }

    public function contents()
    {
        return $this->hasMany(Content::class);
    }
}
