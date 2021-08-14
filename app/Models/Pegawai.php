<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $primaryKey = 'kode_pegawai';
    protected $table = 'pegawai';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        "kode_pegawai",
        "nama" ,
        "jenis_kelamin",
        "agama" ,
        "alamat",
        "tgl_lahir",
        "gaji",
        "no_telp",
        "photo" ,
        'status',
        'id_bagian',
        'id_jabatan' ,

    ];
}
