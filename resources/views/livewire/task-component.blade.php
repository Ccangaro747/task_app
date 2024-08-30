<section class="py-20 lg:py-[50px]">
    <div class="container">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4">
                <div class="max-w-full overflow-x-auto">
                    <div class="flex items-center">
                        <button class="px-6 py-2 ml-10 text-white bg-blue-500 rounded-md hover:bg-blue-400"
                            wire:click="openCreateModal">
                            Agregar Tarea
                        </button>
                    </div>
                    <table class="w-full mt-4 text-white table-auto">
                        <thead>
                            <tr class="text-center bg-gray-800">
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold py-4 lg:py-7 px-3 lg:px-4 border-transparent">
                                    Título
                                </th>
                                <th class="w-1/6 min-w-[160px] text-lg font-semibold py-4 lg:py-7 px-3 lg:px-4">
                                    Descripción
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
                                <td class="px-2 py-5 text-base font-medium text-center text-gray-300 border-gray-700">
                                    {{ $task->description }}
                                </td>
                                <td class="px-2 py-5 text-base font-medium text-center text-gray-300 bg-gray-800 border-gray-700">
                                    <button class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-400"
                                        wire:click="openEditModal({{ $task->id }})">
                                        Editar
                                    </button>
                                    <button class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-400">
                                        Borrar
                                    </button>
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
    <!-- Modal-->
    @if ($modal)
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="w-full max-w-lg mx-4 overflow-hidden bg-white rounded-lg shadow-lg sm:mx-0">
            <div class="p-6">
                <h2 class="mb-6 text-2xl font-bold text-gray-800">{{ $editingTaskId ? 'Editar tarea' : 'Crear nueva tarea' }}</h2>
                <form wire:submit.prevent="saveTask">
                    <div class="mb-4">
                        <label for="title" class="block text-lg font-medium text-gray-700">Título</label>
                        <input wire:model="title" type="text" id="title" name="title" class="block w-full px-3 py-2 mt-1 text-black placeholder-gray-500 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Introduce el título de la tarea">
                    </div>
                    <div class="mb-6">
                        <label for="description" class="block text-lg font-medium text-gray-700">Descripción</label>
                        <input wire:model="description" type="text" id="description" name="description" class="block w-full px-3 py-2 mt-1 text-black placeholder-gray-500 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Introduce una breve descripción">
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button type="submit" class="px-4 py-2 font-medium text-white bg-blue-500 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            {{ $editingTaskId ? 'Actualizar tarea' : 'Crear tarea' }}
                        </button>
                        <button type="button" class="px-4 py-2 font-medium text-gray-700 bg-gray-200 rounded-lg shadow hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500" wire:click="closeCreateModal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</section>
