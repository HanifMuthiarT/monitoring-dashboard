<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-100 flex items-center justify-center h-screen">
    <div class="flex w-full max-w-4xl bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="w-1/2 bg-blue-500 text-white p-10">
            <h2 class="text-3xl font-bold mb-4">Accounts</h2>
            <p>Start Managing Your Accounts Faster and better</p>
            <input type="image" src="resources\image\monitoring.jpg" alt="monitoring">
        </div>
        <div class="w-1/2 p-10">
            <h2 class="text-2xl font-bold mb-6 text-center">Welcome</h2>

            @if ($errors->any())
                <div class="mb-4 text-red-500 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block mb-1">Email</label>
                    <input type="email" name="email" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Password</label>
                    <input type="password" name="password" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4 text-right text-sm">
                    <a href="#" class="text-blue-500 hover:underline">Forget password?</a>
                </div>

                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Login</button>
            </form>

            <p class="text-center mt-6 text-sm">Don't have any account? <a href="register" class="text-blue-500 hover:underline">Register</a></p>
        </div>
    </div>
</body>
</html>
