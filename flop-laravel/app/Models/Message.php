<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'content',
        "time",
        "user_id",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
