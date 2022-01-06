<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Map extends Model {
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_gunung',
        'tinggi',
        'luas',
        'jenis_gunung',
        'status_gunung',
        'status_pendakian',
        'cuaca',
        'kuota_pendakian_hari_ini',
        'jalur_pendakian',
        'persyaratan_pendakian',
        'biaya_simaksi',
        'data_kecelakaan_gunung',
        'contact_us',
        'coordinates',
        'peraturan_wilayah_gunung',
        'long',
        'lat',
    ];
}
