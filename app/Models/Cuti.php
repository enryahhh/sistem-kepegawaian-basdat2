<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_cuti';
    protected $table = 'cuti';
    protected $fillable = [
        'kode_pegawai',
        'tgl_cuti',
        'keterangan',
        'lama_cuti'
    ];
    protected $timestamps = false;
}
