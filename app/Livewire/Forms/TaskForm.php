<?php

namespace App\Livewire\Forms;

use App\Models\Task;
use Livewire\Form;

class TaskForm extends Form
{
    public ?Task $taskModel;

    public $project_id = '';
    public $name = '';
    public $order = '';

    public function rules(): array
    {
        return [
			'project_id' => 'required',
			'name' => 'required|string',
			'order' => 'required',
        ];
    }

    public function setTaskModel(Task $taskModel): void
    {
        $this->taskModel = $taskModel;

        $this->project_id = $this->taskModel->project_id;
        $this->name = $this->taskModel->name;
        $this->order = $this->taskModel->order;
    }

    public function store(): void
    {
        $this->taskModel->create($this->validate());

        $this->reset();
    }

    public function update(): void
    {
        $this->taskModel->update($this->validate());

        $this->reset();
    }
}
