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
    ];

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    public function challenges()
    {
        return $this->belongsToMany(Challenge::class);
    }
}
