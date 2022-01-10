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
    ];
}
