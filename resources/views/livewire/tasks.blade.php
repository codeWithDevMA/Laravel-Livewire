<div>
    <h1 class="text-white">Tasks</h1>
    <form  wire:submit="add">
        <input type="text" class="bg-indigo-500 p-2" 
        wire:model="task">
        <button         
        {{-- wire:keydown.enter="save" --}}
        {{-- wire:click="add" --}}
        class="text-white">Add</button>
    </form>
    <ul>
        @foreach ($tasks as $task)
        <li class="text-white">{{$task}}</li>            
        @endforeach
    </ul>
</div>
