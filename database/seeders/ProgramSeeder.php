<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run()
    {
        Program::insert([
                [
                    'faculty_id' => 1,
                    'nama_prodi' => 'Komputerisasi Akuntansi',
                    'jenjang'    => 'd3',
                ], [
                    'faculty_id' => 1,
                    'nama_prodi' => 'Akuntansi',
                    'jenjang'    => 's1',
                ], [
                    'faculty_id' => 1,
                    'nama_prodi' => 'Manajemen Retail',
                    'jenjang'    => 's1',
                ], [
                    'faculty_id' => 2,
                    'nama_prodi' => 'Manajemen Informatika',
                    'jenjang'    => 'd3',
                ], [
                    'faculty_id' => 2,
                    'nama_prodi' => 'Teknik Informatika',
                    'jenjang'    => 'd3',
                ], [
                    'faculty_id' => 2,
                    'nama_prodi' => 'Sistem Informasi',
                    'jenjang'    => 's1',
                ], [
                    'faculty_id' => 2,
                    'nama_prodi' => 'Sistem Komputer',
                    'jenjang'    => 's1',
                ], [
                    'faculty_id' => 2,
                    'nama_prodi' => 'Teknik Informatika',
                    'jenjang'    => 's1',
                ], [
                    'faculty_id' => 2,
                    'nama_prodi' => 'Sistem Komputer',
                    'jenjang'    => 's2',
                ],
            ]
        );
    }
}
