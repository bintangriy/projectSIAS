<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    // Tentukan atribut yang dapat diisi secara massal
    protected $fillable = ['judul', 'nip', 'deskripsi', 'file_path'];

    public function dataguru()
    {
        return $this->belongsTo(Dataguru::class);
    }
}
