<?php

namespace App\Http\Controllers;

use App\Models\MonitoredFile;
use Illuminate\Http\Request;
use App\Models\FileData;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $filesPerDay = MonitoredFile::select(
            DB::raw('DATE(detected_at) as date'),
            DB::raw('COUNT(*) as count')
        )->groupBy(DB::raw('DATE(detected_at)'))->pluck('count', 'date');
    
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
    
        $days = [];
        for ($date = $startOfMonth->copy(); $date <= $endOfMonth; $date->addDay()) {
            $key = $date->toDateString();
            $days[$key] = $filesPerDay[$key] ?? 0;
        }
    
        $files = MonitoredFile::latest('detected_at')->get();
    
        $originStats = FileData::select('origin', DB::raw('count(*) as total'))
                        ->groupBy('origin')->pluck('total', 'origin');
        
                        $filledCount = collect($days)->filter(fn($c) => $c > 0)->count();
                        $emptyCount = collect($days)->filter(fn($c) => $c === 0)->count();                        
    
        return view('dashboard', compact('days',  'originStats', 'filledCount', 'emptyCount', 'files'));
    }
}