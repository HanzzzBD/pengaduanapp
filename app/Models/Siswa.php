<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';
    protected $primaryKey = 'nis';
    public $incrementing = false;   // karena nis bukan auto increment
    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = ['nis', 'kelas'];
}
