<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $fillable = [
        'text',
        'participation_id',
        'participation_type_id'
    ];

    public function participation()
    {
        return $this->belongsTo(Participation::class);
    }

    public function participation_type()
    {
        return $this->belongsTo(Participation_type::class);
    }
}
