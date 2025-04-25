<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FileData;
use Illuminate\Support\Carbon;

class FileDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FileData::insert([
            [
                'filename' => 'data_jakarta.csv',
                'origin' => 'Jakarta',
                'detected_at' => Carbon::now()->subMinutes(10),
            ],
            [
                'filename' => 'data_bandung.xls',
                'origin' => 'Bandung',
                'detected_at' => Carbon::now()->subMinutes(20),
            ],
        ]);
    }
}
