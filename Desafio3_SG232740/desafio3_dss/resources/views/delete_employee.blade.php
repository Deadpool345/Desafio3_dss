<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Eliminación</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-200 via-blue-300 to-blue-400">

<div class="container mx-auto max-w-md p-8 mt-10 bg-white rounded-lg shadow-md">

    <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">Confirmar Eliminación</h1>

    <!-- Mensaje de confirmación -->
    <p class="text-lg text-gray-800 mb-8">¿Estás seguro de que deseas eliminar este empleado?</p>

    <!-- Formulario de confirmación -->
    <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" class="flex justify-center">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-400 hover:bg-red-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Eliminar</button>
        <a href="{{ url('/panel') }}" class="ml-4 bg-blue-200 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded">Cancelar</a>
    </form>

</div>

</body>
</html>
