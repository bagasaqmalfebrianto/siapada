<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pekerjaans')->insert([
            [
                'title' => 'Software Engineer',
                'nama_perusahaan' => 'Tech Innovators',
                'jenis' => 'Full-time',
                'type' => 'Remote',
                'pendidikan' => 'S1 Teknik Informatika',
                'gaji_minimum' => 6000000,
                'gaji_maksimum' => 10000000,
            ],
            [
                'title' => 'Marketing Specialist',
                'nama_perusahaan' => 'Market Leaders',
                'jenis' => 'Full-time',
                'type' => 'On-site',
                'pendidikan' => 'S1 Marketing',
                'gaji_minimum' => 5000000,
                'gaji_maksimum' => 8000000,
            ],
            [
                'title' => 'Graphic Designer',
                'nama_perusahaan' => 'Creative Studios',
                'jenis' => 'Part-time',
                'type' => 'Remote',
                'pendidikan' => 'D3 Desain Grafis',
                'gaji_minimum' => 3000000,
                'gaji_maksimum' => 6000000,
            ],
            [
                'title' => 'Data Analyst',
                'nama_perusahaan' => 'Data Insights',
                'jenis' => 'Full-time',
                'type' => 'On-site',
                'pendidikan' => 'S1 Statistika',
                'gaji_minimum' => 7000000,
                'gaji_maksimum' => 12000000,
            ],
        ]);
    }
}
