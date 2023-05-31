<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        "description",
        "user_id",
        "duration"
    ];

    public function options()
    {
        return $this->hasMany(Option::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
