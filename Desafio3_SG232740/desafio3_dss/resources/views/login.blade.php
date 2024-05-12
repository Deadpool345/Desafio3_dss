<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gradient-to-r from-cde8e5 to-eef7ff flex items-center justify-center h-screen bg-[#F6F1F1]">
    <div class="bg-white rounded-lg shadow-md p-8 max-w-sm w-full">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Iniciar sesión</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="correo" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                <input type="email" id="correo" name="correo" class="mt-1 block w-full rounded-md border-[#19A7CE] shadow-sm focus:border-[#19A7CE] focus:ring focus:ring-[#19A7CE] " required >
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" id="password" name="password" class="mt-1 block w-full rounded-md border-[#19A7CE] shadow-sm focus:border-[#19A7CE] focus:ring focus:ring-[#19A7CE]" required>
            </div>
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-7ab2b2 focus:ring-7ab2b2 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-900">Recordarme</label>
                </div>
                <div class="text-sm">
                    <a href="{{ url('/registro') }}" class="font-medium text-7ab2b2 hover:text-4d869c">¿No tienes Cuenta?</a>
                </div>
            </div>
            <div>
                <button type="submit" class="bg-[#19A7CE] w-full bg-gradient-to-r from-7ab2b2 to-4d869c text-white font-semibold py-2 px-4 rounded-md hover:bg-opacity-90 focus:outline-none focus:ring focus:ring-7ab2b2 focus:ring-opacity-50">Iniciar sesión</button>
            </div>
        </form>
    </div>
</body>
</html>
