<?php

namespace App\Livewire\Tasks;

use App\Livewire\Forms\TaskForm;
use App\Models\Project;
use App\Models\Task;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Create extends Component
{
    public TaskForm $form;

    #[Computed()]
    public function projects()
    {
        return Project::all();
    }

    public function mount(Task $task)
    {
        $this->form->setTaskModel($task);
    }

    public function save()
    {
        $this->form->store();

        return $this->redirectRoute('tasks.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.task.create');
    }
}
