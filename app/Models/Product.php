<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'desc',
        'content',
        'keywords',
        'harga_asli',
        'harga_diskon',
        'link_checkout',
        'media',
        'hash',
        'status',
    ];

    protected $casts = [
        'link_checkout' => 'array',
        'media' => 'array',
        'status' => 'boolean',
    ];
}
