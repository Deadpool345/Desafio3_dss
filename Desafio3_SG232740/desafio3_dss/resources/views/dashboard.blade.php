<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold mb-4">Bienvenido, {{ Auth::guard('employee')->user()->nombre }}</h1>


        <div class="bg-white shadow rounded-lg p-6 mb-4">
            <p><span class="font-semibold">Nombre:</span> {{ Auth::guard('employee')->user()->nombre }}</p>
            <p><span class="font-semibold">Apellido:</span> {{ Auth::guard('employee')->user()->apellido }}</p>
            <p><span class="font-semibold">Correo electrónico:</span> {{ Auth::guard('employee')->user()->correo }}</p>
            <p><span class="font-semibold">Salario:</span> {{ Auth::guard('employee')->user()->salario }}</p>
            <p><span class="font-semibold">Cargo:</span> {{ Auth::guard('employee')->user()->cargo }}</p>
            <p><span class="font-semibold">Rol:</span> {{ Auth::guard('employee')->user()->role }}</p>
        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden mb-4">
            <img src="data:image/jpeg;base64,{{ base64_encode(Auth::guard('employee')->user()->foto) }}" alt="Foto de perfil" class="w-full max-w-xs h-auto">
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">Cerrar sesión</button>
        </form>
    </div>
</body>
</html>
