<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    public function run()
    {
        // create a new faculty
        Faculty::insert([
                [
                    'nama_fakultas' => 'Fakultas Ekonomi dan Bisnis',
                ],
                [
                    'nama_fakultas' => 'Fakultas Sains dan Teknologi',
                ],
            ]
        );
    }
}
