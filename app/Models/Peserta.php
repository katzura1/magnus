<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peserta extends Model
{
    use SoftDeletes;

    protected $table = 'pesertas';
    protected $fillable  = [
        'nama',
        'jenis_kelamin',
        'hobi',
        'email',
        'telp',
        'username',
        'password',
    ];
}
