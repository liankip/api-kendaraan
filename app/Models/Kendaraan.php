<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    public function kendaraanable()
    {
        return $this->morphTo(__FUNCTION__, 'kendaraanable_type', 'kendaraanable_id');
    }
}
