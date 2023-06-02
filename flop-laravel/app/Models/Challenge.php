<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'name',
        "description",
        "start_time",
        "end_time",
        "is_contest",
        "colorCoins_earned_by_participation",
        "reward_id",
        "user_id",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function participations()
    {
        return $this->hasMany(Participation::class);
    }
    public function reward()
    {
        return $this->belongsTo(Reward::class);
    }

    public function participation_types()
    {
        return $this->belongsToMany(Participation_type::class);
    }
}
