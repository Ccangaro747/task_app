<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $task = new Task();
        $task->title = 'Tarea 1';
        $task->description = 'Descripción de la tarea 1';
        $task->user_id = User::find(1)->id; // Busca el usuario con ID 1 y asigna su ID al campo user_id de la tarea
        $task->save();
    }
}
