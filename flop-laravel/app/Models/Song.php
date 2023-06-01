<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'name',
        "artist",
        "duration",
        "played_times"
    ];

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
