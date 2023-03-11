<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Gallery extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'gallerys';
    protected $fillable = [
        'name', 'photo', 'keterangan'
    ];
}
