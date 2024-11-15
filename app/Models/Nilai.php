<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    public function datasiswa()
    {
        return $this->belongsTo(Datasiswa::class);
    }
}
