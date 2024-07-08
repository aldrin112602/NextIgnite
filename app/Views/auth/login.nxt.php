<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <nav class="bg-white py-5 md:px-12 px-4 shadow-lg w-100 flex justify-between">
        <h1 class="text-2xl font-bold text-blue-900">Next-Ignite</h1>
        <ul class="flex gap-7 justify-end">
            <li>
                <a href="/" class="text-blue-900">Home</a>
            </li>
            <li>
                <a href="/login" class="text-blue-900">Login</a>
            </li>
            <li>
                <a href="/signup" class="text-blue-900">Signup</a>
            </li>
        </ul>
    </nav>
    <div class="flex items-center justify-center h-screen">
        <div class="w-full max-w-md bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
            <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
            <form action="/login" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="border-gray-500 appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-600" name="email" id="email" type="email" required>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="border-gray-500 appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:border-blue-600" name="password" id="password" type="password">
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg focus:outline-none focus:border-blue-600" type="submit">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>