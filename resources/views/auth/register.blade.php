<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-100 flex items-center justify-center h-screen">
    <div class="flex w-full max-w-4xl bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="w-1/2 bg-blue-500 text-white p-10">
            <h2 class="text-3xl font-bold mb-4">Accounts</h2>
            <p>Start Managing Your Accounts Faster and better</p>
        </div>
        <div class="w-1/2 p-10">
            <h2 class="text-2xl font-bold mb-6 text-center">Welcome</h2>

            @if ($errors->any())
                <div class="mb-4 text-red-500 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block mb-1">Email</label>
                    <input type="email" name="email" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Fullname</label>
                    <input type="fullname" name="fullname" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Username</label>
                    <input type="username" name="username" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Password</label>
                    <input type="password" name="password" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- <div class="mb-4">
                    <label class="block mb-1">Confirm Password</label>
                    <input type="confirmpassword" name="confirmpassword" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div> -->

                <div class="mb-4 text-right text-sm">
                    <a href="#" class="text-blue-500 hover:underline">Forget password?</a>
                </div>

                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Register</button>
            </form>

            <p class="text-center mt-6 text-sm">Don't have any account? <a href="login" class="text-blue-500 hover:underline">Login</a></p>
        </div>
    </div>
</body>
</html>
