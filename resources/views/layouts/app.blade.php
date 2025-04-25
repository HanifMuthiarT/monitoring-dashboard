<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Monitoring Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="flex bg-blue-100 h-screen">
    <aside class="w-64 bg-blue-700 text-white p-6">
        <h2 class="text-2xl font-bold mb-10">Dashboard</h2>
        <ul class="space-y-4">
            <li><a href="/" class="hover:underline">Dashboard</a></li>
            <li>Lorem Ipsum</li>
            <li>Lorem Ipsum</li>
            <li>Lorem Ipsum</li>
        </ul>
    </aside>

    <main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
        @yield('content')
    </main>
    @stack('scripts')
</body>
</html>