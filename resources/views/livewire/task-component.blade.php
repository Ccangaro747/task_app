<section class="py-20 lg:py-[120px]">
    <div class="container">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4">
                <div class="max-w-full overflow-x-auto">
                    <table class="w-full text-white table-auto">
                        <thead>
                            <tr class="text-center bg-gray-800">
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold py-4 lg:py-7 px-3 lg:px-4 border-transparent ">
                                    Titulo
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold py-4 lg:py-7 px-3 lg:px-4">
                                    Descripcion
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold py-4 lg:py-7 px-3 lg:px-4">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(Auth::user()->tasks->isNotEmpty())
                            @foreach (Auth::user()->tasks as $task)
                            <tr>
                                <td class="px-2 py-5 text-base font-medium text-center text-gray-300 bg-gray-800 border-gray-700">
                                    {{ $task->title }}
                                </td>
                                <td class="px-2 py-5 text-base font-medium text-center text-gray-300 bg-gray-700 border-gray-700">
                                    {{ $task->description }}
                                </td>
                                <td class="px-2 py-5 text-base font-medium text-center text-gray-300 bg-gray-800 border-gray-700">
                                    <!-- Agregar acciones aquí -->
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="3" class="px-2 py-5 text-base font-medium text-center text-gray-300 bg-gray-800 border-gray-700">
                                    No hay tareas disponibles.
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
