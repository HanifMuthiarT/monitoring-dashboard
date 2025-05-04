@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <div class="w-64 h-64 bg-white rounded-xl shadow-md flex flex-col items-center justify-center">
            <canvas id="dataChart" width="400" height="400"></canvas>
        </div>
    </div>
    <div class="w-1/2 bg-white rounded-xl shadow-md p-4">
        <h3 class="text-lg font-bold mb-4">{{ \Carbon\Carbon::now('Asia/Jakarta')->translatedFormat('F Y') }}</h3>
        <div class="grid grid-cols-7 gap-2">
            @foreach ($days as $date => $count)
                <div class="text-center p-2 rounded 
                    {{ $count > 0 ? 'bg-green-300 text-green-800' : 'bg-red-300 text-red-800' }}">
                    <div class="font-semibold">{{ \Carbon\Carbon::parse($date)->format('d') }}</div>
                    <div class="text-sm">{{ $count > 0 ? "$count data" : "Kosong" }}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-md p-4">
    <h3 class="text-xl font-bold mb-4">Notifikasi Data Masuk</h3>
    <ul>
        @foreach ($files as $file)
            <li class="border-t py-2">
                [{{ \Carbon\Carbon::parse($file->detected_at)->format('H:i') }}]
                Data Masuk dari {{ $file->filename ?? 'Unknown' }}
            </li>
        @endforeach
    </ul>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ctx = document.getElementById('dataChart');
        if (ctx) {
            const data = {
                labels: ['Terisi', 'Kosong'],
                datasets: [{
                    label: 'Statistik Data Harian',
                    data: [{{ $filledCount ?? 0 }}, {{ $emptyCount ?? 0 }}],
                    backgroundColor: ['#4ade80', '#f87171'],
                    borderColor: ['#22c55e', '#ef4444'],
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'pie',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        title: {
                            display: true,
                            text: 'Distribusi Tanggal Terisi vs Kosong'
                        }
                    }
                }
            };

            new Chart(ctx, config);
        }
    });
</script>
@endpush
