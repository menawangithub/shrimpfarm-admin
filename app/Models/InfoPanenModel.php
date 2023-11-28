<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class InfoPanenModel extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'infopanen';

    protected $fillable = [
        '_id',
        'jenis_panen',
        'perkiraan_panen',
        'ukuran_panen',
        'tonase_panen',
        'usia_budidaya',
        'harga_harapan',
        'lokasi_budidaya',
        'user_id',
        'custom_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Calculate the total number of documents in the collection
            $totalDocuments = self::count();

            // Generate a 4-digit ID with leading zeros
            $fourDigitId = str_pad($totalDocuments + 1, 4, '0', STR_PAD_LEFT);

            // Set the custom_id field with the desired format
            $model->custom_id = "SF-" . $fourDigitId;
        });
    }
}
