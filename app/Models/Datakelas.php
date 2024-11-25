<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datakelas extends Model
{
    use HasFactory;
    protected $fillable = ['id_kelas', 'kelas'];
    protected $primaryKey = 'id_kelas';

    public $timestamps = false;

    public function datasiswa()
    {
        return $this->hasMany(Datasiswa::class, 'id_kelas', 'kelas');
    }
}
