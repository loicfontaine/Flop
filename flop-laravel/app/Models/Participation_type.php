<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation_type extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'title',
        "content"
    ];

    public function participations()
    {
        return $this->belongsToMany(Participation::class);
    }

    public function challenges()
    {
        return $this->belongsToMany(Challenge::class);
    }
}
