<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\FileData;
use Illuminate\Support\Carbon;

class ScanNewData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scan:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $files = Storage::files('data/new');

        foreach ($files as $file) {
            $filename = basename($file);

            // Cek apakah file sudah ada di DB
            if (!FileData::where('filename', $filename)->exists()) {

                // Extract asal dari nama file (misal: data_jakarta.csv)
                preg_match('/data_(.+?)\./', $filename, $match);
                $origin = isset($match[1]) ? ucfirst(str_replace('_', ' ', $match[1])) : 'Unknown';

                FileData::create([
                    'filename' => $filename,
                    'origin' => $origin,
                    'detected_at' => Carbon::now(),
                ]);

                $this->info("Data baru ditemukan: $filename");
            }
        }

        return 0;
    }
}
