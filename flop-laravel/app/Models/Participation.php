<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
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

    public function participation_types()
    {
        return $this->belongsToMany(Participation_type::class);
    }
}
