<?php

namespace App\Console\Commands;

use App\Models\MonitoredFile;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class ScanLocalDisk extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scan:localdisk';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'scan folder lokal untuk file baru';

    /**
     * Execute the console command.
     */
    protected $folderPath = 'C:\backup\BRK\karimun\servanda\PROCEED';
    
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->folderPath = env('MONITOR_FOLDER');
    // }

    public function handle()
    {
        $files = File::allFiles($this->folderPath);
        foreach ($files as $file) {
            $exists = MonitoredFile::where('path', $file->getRealPath())->exists();
            if (!$exists){
                MonitoredFile::create(['filename' => $file->getFilename(),
                'path' => $file->getRealPath(),
                'detected_at' => Carbon::now(),
            ]);
            
            $this->info('File baru ditemukan' . $file->getFilename());
            }
        }

    //     // ====== Langkah 1: Hapus semua data path yang tidak cocok =======
    //     $this->deleteOldPathData();

    //     // ====== Langkah 2: Scan file baru di folder baru =======
    //     $files = File::files($this->folderPath);

    //     foreach ($files as $file) {
    //         $exists = MonitoredFile::where('path', $file->getRealPath())->exists();

    //         if (!$exists) {
    //             MonitoredFile::create([
    //                 'filename' => $file->getFilename(),
    //                 'path' => $file->getPathname(),
    //                 'detected_at' => Carbon::now(),
    //             ]);

    //             $this->info('File baru ditemukan dan ditambahkan: ' . $file->getFilename());
    //         }
    //     }
    // }

    // // Fungsi untuk menghapus data dari path lama
    // protected function deleteOldPathData()
    // {
    //     // Hapus semua data yang path-nya tidak diawali path sekarang
    //     $deleted = MonitoredFile::where('path', 'not like', $this->folderPath.'%')->delete();

    //     $this->info("Data dari path lama sudah dihapus. Total yang dihapus: $deleted");
     }
}
