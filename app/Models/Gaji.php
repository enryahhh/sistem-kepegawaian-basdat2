<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_gaji';
    protected $table = 'gaji';
    public $timestamps = false;
}
