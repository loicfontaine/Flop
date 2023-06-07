<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        "title",
        "description",
        "user_id",
        "duration",
        "start_date"
    ];

    public function options()
    {
        return $this->hasMany(Option::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function command_lines()
    {
        return $this->belongsToMany(Command_line::class);
    }
}
