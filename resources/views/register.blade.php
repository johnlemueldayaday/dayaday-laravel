<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <form method="POST" action="/register" class="bg-white p-6 rounded shadow-md w-80">
        @csrf
        <h1 class="text-2xl font-bold mb-4">Register</h1>
        <input type="text" name="name" placeholder="Name" class="w-full mb-3 p-2 border rounded">
        <input type="email" name="email" placeholder="Email" class="w-full mb-3 p-2 border rounded">
        <input type="password" name="password" placeholder="Password" class="w-full mb-3 p-2 border rounded">
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded">Register</button>
    </form>
</body>
</html>
