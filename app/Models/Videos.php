<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "videos";
    protected $fillable = [
        'title', 'description', 'image', 'link', 'status', 'slug'
    ];
}
