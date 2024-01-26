<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
use Livewire\Component;
use Livewire\WithPagination;

class TasksList extends Component
{
    // $this->tasks=Task::all();
    use WithPagination;

    public function placeholder()
    {
        return view('skeleton');
    }

    public function changeStatus($id, $status)
    {
        $task = Task::find($id);
        $task->update([
            'status' => $status
        ]);
        unset($this->taskByStatus);
    }

    public function delete(Task $task)
    {
        //  $this->dispatch('delete-task');
        $task->delete();
        unset($this->taskByStatus);
    }
    #[Computed(persist:true,seconds:7200,cache:true,key:'tasks-created')]

    public function tasks()
    {
        return auth()->user()->tasks()->orderBy('id', 'desc')->paginate(5);
    }

    #[Computed(persist: true)]
    public function taskByStatus()
    {
        return auth()->user()->tasks()->select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->orderBy('status', 'desc')
            ->get();
    }

    // #[On('task-created')]
    public function taskCreated()
    {
        unset($this->taskByStatus);
    }

    #[On('delete-task')]
    public function render()
    {
        return view('livewire.tasks.tasks-list');
    }
}