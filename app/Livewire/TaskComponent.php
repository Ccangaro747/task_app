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

    public function mount()
    {
        $this->tasks = Task::where('user_id', auth()->user()->id)->get();
    }
    public function render()
    {
        return view('livewire.task-component');
    }
    private function clearFields(){
        $this->title = '';
        $this->description = '';
    }
    public function openCreateModal(){
        $this->clearFields();
        $this->modal = true;
    }
    public function closeCreateModal(){
        $this->modal = false;
    }

    public function createTask(){
        $newTask = new Task();
        $newTask->title = $this->title;
        $newTask->description = $this->description;
        $newTask->user_id = auth()->user()->id;
        $newTask->save();
        $this->clearFields();
        $this->modal = false;
    }
}
