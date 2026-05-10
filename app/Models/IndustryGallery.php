<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustryGallery extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'media_path', 'media_type', 'is_featured'];
}
