<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal',
        'file_path',
        'status'
    ];

    protected $table = 'arsip';

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function getHashIdAttribute()
    {
        return base64_encode($this->id);
    }

    public static function findByHashId($hashId)
    {
        $id = base64_decode($hashId);
        return self::findOrFail($id);
    }
}
