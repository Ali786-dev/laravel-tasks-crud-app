<?php

namespace App\Livewire\Tasks;

use App\Models\Project;
use App\Models\Task;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    public $projectID;

    #[Computed()]
    public function projects()
    {
        return Project::all();
    }

    #[Computed()]
    public function tasks()
    {
        if ($this->projectID) {
            return Task::where('project_id', $this->projectID)
                ->orderBy('order')
                ->get();
        }

        return Task::orderBy('order')->get();
    }

    public function render(): View
    {
        return view('livewire.task.index');
    }

    public function updateTaskOrder($tasks)
    {
        foreach ($tasks as $task) {
            Task::whereId($task['value'])
                ->update(['order' => $task['order']]);
        }
    }

    public function delete(Task $task)
    {
        $task->delete();

        return $this->redirectRoute('tasks.index', navigate: true);
    }
}
