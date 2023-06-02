<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'title',
        "poll_id",
        "song_id"
    ];

    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }
    public function song()
    {
        return $this->belongsTo(Song::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
