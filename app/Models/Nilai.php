<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nilai extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['nis', 'ppkn', 'b_indo', 'agama', 'mtk', 'ipa', 'ips', 'b_inggris', 'rata_rata'];

    public function datasiswa()
    {
        return $this->belongsTo(Datasiswa::class);
    }
}
