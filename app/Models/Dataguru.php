<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataguru extends Model
{
    use HasFactory;
    protected $primaryKey = 'nip';
    protected $fillable = [
        'nip',
        'nama',
        'pendidikan',
        'jabatan',
    ];

    public function mapel()
    {
        return $this->hasMany(Mapel::class, 'pengajar', 'nip');
    }
}
