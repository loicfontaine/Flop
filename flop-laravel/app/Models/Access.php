<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    public $timestamps = false;
    protected $table = 'accesses';
    use HasFactory;
    protected $fillable = [
        'title',
    ];


    public function Groups()
    {
        return $this->belongsToMany(Group::class);
    }
}
