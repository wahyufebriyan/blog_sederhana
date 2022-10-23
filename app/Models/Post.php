<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'title', 'kategori', 'description', 'image',
    ];

    // protected $casts = [
    //     'kategori' => 'json',
    // ];

}
