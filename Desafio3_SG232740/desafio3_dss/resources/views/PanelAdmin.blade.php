<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen m-[2rem]">
    <h1 class="text-3xl font-bold mb-8">Bienvenido al Panel de Administrador</h1>

    <!-- Muestra la información del administrador -->
    <div class="flex mb-[5rem]">
        <img src="data:image/jpeg;base64,{{ base64_encode(Auth::guard('employee')->user()->foto) }}" alt="Foto de perfil del administrador" class="w-20 h-20 rounded-full mr-4">
        <div>
            <h2 class="text-xl font-semibold">{{ Auth::guard('employee')->user()->nombre }}</h2>
            <p class="text-lg">{{ Auth::guard('employee')->user()->correo }}</p>
        </div>
    </div>

    <a href="{{ route('empleados.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Crear nuevo empleado</a>

    <div class="overflow-x-auto mb-[2rem]">
        <table class="min-w-full border-collapse border border-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Apellido</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Correo electrónico</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Salario</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cargo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($empleados as $empleado)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $empleado->nombre }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $empleado->apellido }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $empleado->correo }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $empleado->salario }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $empleado->cargo }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img src="data:image/jpeg;base64,{{ base64_encode($empleado->foto) }}" alt="Foto de perfil" class="w-10 h-10 rounded-full">
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('empleados.edit', ['id' => $empleado->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-2">Editar</a>
                            <a href="{{ route('empleados.confirmDelete', ['empleado' => $empleado]) }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Botón para cerrar sesión -->
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Cerrar sesión</button>
    </form>
</body>
</html>
