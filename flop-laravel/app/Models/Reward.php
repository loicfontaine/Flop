<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        "article_id",
        "user_id",
        "participation_id"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function participation()
    {
        return $this->belongsTo(Participation::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }
}
