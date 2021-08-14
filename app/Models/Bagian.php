<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_bagian';
    protected $table = 'bagian';
    public $timestamps = false;

    protected $fillable = [
        'nama_bagian'
    ];

}
