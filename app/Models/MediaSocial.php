<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class MediaSocial extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'social_medias';
    protected $fillable = [
        'sosmed', 'name'
    ];
}
