<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kamera extends Model
{

    use HasFactory;
    protected $table = 'tabel_kamera';
    protected $keyType = 'string';
    protected $primaryKey = 'id_kamera';

    protected static function boot(){
        parent::boot();
        static::creating(function ($model){
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    public function getIncrementing(){
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }


    protected $fillable = [
        'id_kamera',
        'nama_kamera',
        'keterangan',
        'harga_sewa',
        'stok_kamera',
        'type_kamera',
        'image_kamera',

    ];
}
