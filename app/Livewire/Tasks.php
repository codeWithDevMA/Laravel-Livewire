<?php

namespace App\Livewire;

use Livewire\Component;

class Tasks extends Component
{
    public $tasks=[];
    public $task="";
    public function mount(){
        $this->tasks=['first task',"second task"];
    }
    public function add(){
        $this->tasks[]=$this->task;
        // $this->task="";
        $this->reset("task");
    }
    public function render()
    {
        return view('livewire.tasks');
    }
}
