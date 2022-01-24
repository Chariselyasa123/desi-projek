<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    /**
     * Give the model a table name.
     * @var string $table
     */
    protected $table = 'about_us';

    /**
     * The attributes that are mass assignable.
     * @var array $fillable
     */
    protected $fillable = [
        'ketua_umum',
        'sekertaris',
        'bendahara',
        'kepala_bidang_1',
        'kepala_bidang_2',
        'kepala_bidang_3',
        'kepala_bidang_4',
        'kepala_bidang_5',
        'kepala_divisi_1',
        'kepala_divisi_2',
        'periode_menjabat',
        'gambar_ketua_umum',
        'gambar_sekertaris',
        'gambar_bendahara',
        'gambar_kepala_bidang_1',
        'gambar_kepala_bidang_2',
        'gambar_kepala_bidang_3',
        'gambar_kepala_bidang_4',
        'gambar_kepala_bidang_5',
        'gambar_kepala_divisi_1',
        'gambar_kepala_divisi_2',
    ];
}
