<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'deskripsi'];

    protected $table = 'kategori';

    public function arsip()
    {
        return $this->hasMany(Arsip::class);
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
