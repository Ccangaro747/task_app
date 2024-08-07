<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl text-purple-800 font-2xl">Bienvenido al gestor de tareas</h1>
                    @foreach ($tasks as $task)
                    <p class="mt-4 text-lg text-purple-800">
                        {{ $task->title }}
                    </p>
                    <p>
                        {{ $task->description }}
                    </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
