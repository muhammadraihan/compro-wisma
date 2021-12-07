<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class RoomType extends Model
{
    use HasFactory;
    use Uuid;

    protected $fillable = [
        'id_wisma', 'room_type', 'name', 'price', 'facility', 'photo'
    ];

    public function wisma() {
        return $this->belongsTo(Wisma::class, 'id_wisma', 'uuid');
    }
}
