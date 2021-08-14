<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pegawai;
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
    public $timestamps = false;

    public function pegawai(){
        return $this->belongsTo(Pegawai::class,'kode_pegawai');
    }
}
