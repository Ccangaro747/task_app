<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskComponent extends Component
{
    public $tasks = [];
    public $title;
    public $description;
    public $modal = false;
    public $editingTaskId = null; // Añadido para editar tareas

    public function mount()
    {
        $this->tasks = Task::where('user_id', auth()->user()->id)->get();
    }

    public function render()
    {
        return view('livewire.task-component');
    }

    private function clearFields()
    {
        $this->title = '';
        $this->description = '';
    }

    public function openCreateModal()
    {
        $this->clearFields();
        $this->editingTaskId = null; // Limpia la ID de la tarea que se está editando
        $this->modal = true;
    }

    public function openEditModal($taskId)
    {
        $task = Task::find($taskId);
        if ($task) {
            $this->title = $task->title;
            $this->description = $task->description;
            $this->editingTaskId = $taskId;
            $this->modal = true;
        }
    }

    public function closeCreateModal()
    {
        $this->modal = false;
    }

    public function saveTask()
    {
        if ($this->editingTaskId) {
            // Editar tarea existente
            $task = Task::find($this->editingTaskId);
            if ($task) {
                $task->title = $this->title;
                $task->description = $this->description;
                $task->save();
            }
        } else {
            // Crear nueva tarea
            $newTask = new Task();
            $newTask->title = $this->title;
            $newTask->description = $this->description;
            $newTask->user_id = auth()->user()->id;
            $newTask->save();
        }

        $this->clearFields();
        $this->modal = false;
        $this->tasks = Task::where('user_id', auth()->user()->id)->get(); 
    }
}
