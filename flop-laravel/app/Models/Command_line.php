<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command_line extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        "order_id",
        "article_id",
        "user_id",
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
