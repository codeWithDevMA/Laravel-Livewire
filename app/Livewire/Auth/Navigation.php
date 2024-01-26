<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Navigation extends Component
{
    public $name="code with hichem";
    public function render()
    {
        return view('livewire.auth.navigation');
        // ->with(
        //     [
        //          "name"=>"code with hichem"
        //         ]

        // );
    }
}
