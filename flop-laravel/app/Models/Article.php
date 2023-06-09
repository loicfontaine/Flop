<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'name',
        "description",
        "image",
        "price",
        "nb_stock",
        "is_displayed",
        "user_id",
        "challenge_id",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function rewards()
    {
        return $this->hasMany(Reward::class);
    }
    public function command_lines()
    {
        return $this->hasMany(Command_line::class);
    }
}
