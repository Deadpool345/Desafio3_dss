<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#AFD3E2]">

<div class=" container mx-auto max-w-md p-8 mt-10 bg-white rounded-lg shadow-md">

    <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">Editar Empleado</h1>

    <!-- Formulario para editar la información del empleado -->
    <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nombre" class="block text-sm font-semibold text-gray-800">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{ $empleado->nombre }}" class="w-full border-b-2 border-blue-400 py-2 px-3 text-gray-700 focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="apellido" class="block text-sm font-semibold text-gray-800">Apellido</label>
            <input type="text" id="apellido" name="apellido" value="{{ $empleado->apellido }}" class="w-full border-b-2 border-blue-400 py-2 px-3 text-gray-700 focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="correo" class="block text-sm font-semibold text-gray-800">Correo electrónico</label>
            <input type="email" id="correo" name="correo" value="{{ $empleado->correo }}" class="w-full border-b-2 border-blue-400 py-2 px-3 text-gray-700 focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="cargo" class="block text-sm font-semibold text-gray-800">Cargo</label>
            <input type="text" id="cargo" name="cargo" value="{{ $empleado->cargo }}" class="w-full border-b-2 border-blue-400 py-2 px-3 text-gray-700 focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="salario" class="block text-sm font-semibold text-gray-800">Salario</label>
            <input type="number" id="salario" name="salario" value="{{ $empleado->salario }}" class="w-full border-b-2 border-blue-400 py-2 px-3 text-gray-700 focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-semibold text-gray-800">Contraseña</label>
            <input type="password" id="password" name="password" class="w-full border-b-2 border-blue-400 py-2 px-3 text-gray-700 focus:outline-none focus:border-blue-500">
        </div>

        <div class="flex justify-center">
            <button type="submit" class="bg-[#19A7CE]  text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Guardar cambios</button>
            <a href="{{ url('/panel') }}" class="ml-4 bg-[#146C94] text-white font-bold py-2 px-4 rounded">Cancelar</a>
        </div>

    </form>

</div>

</body>
</html>
