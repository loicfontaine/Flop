<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'address',
        "status",
        "user_id",
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function command_lines()
    {
        return $this->belongsToMany(Command_line::class);
    }
}
