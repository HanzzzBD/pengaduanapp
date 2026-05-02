<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;

    protected $table = 'aspirasis';
    protected $primaryKey = 'id_aspirasi';

    protected $fillable = [
        'username',
        'id_pelapor',
        'id_kategori',
        'status',
        'feedback'
    ];

    public function inputAspirasi()
    {
        return $this->belongsTo(InputAspirasi::class, 'id_pelapor', 'id_pelapor');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kat');
    }
}
