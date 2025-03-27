<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Parsed Data</h1>
        <div class="mb-4">
            <p class="text-gray-700"><span class="font-semibold">Name:</span> {{ $name }}</p>
        </div>
        <div class="mb-4">
            <p class="text-gray-700"><span class="font-semibold">Email:</span> {{ $email }}</p>
        </div>
        <div class="mb-4">
            <p class="text-gray-700"><span class="font-semibold">Password:</span> {{ $password }}</p>
        </div>
    </div>
</body>
</html>
