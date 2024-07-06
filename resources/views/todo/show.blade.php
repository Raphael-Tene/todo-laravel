<x-layout>
   
    <div class="bg-gray-900 rounded-lg p-4 mt-2">
        <h3 class="text-md  font-bold">{{$todo['title']}}</h3>
        <div class="flex justify-between mt-2">
            <small class="ml-2 text-sm text-gray-600">{{ optional($todo->created_at)->format('j M Y, g:i a') }}</small>
            <div class=" flex items-center gap-3">
                <small class="text-gray-400">{{$todo->user->name}}</small>
                @can('update-todo', $todo)
                <a href="/todos/{{ $todo->id }}/edit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Edit</a>
                @endcan
            </div>
            
        </div>
        
    </div>
    @if (session('message'))
    <div id="alert" class="bg-green-100 border mt-16 border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('message') }}</span>
    </div>
    @endif
</x-layout>


<script>
    window.onload = function() {
        setTimeout(function() {
            const alert = document.getElementById('alert');
            if (alert) alert.style.display = 'none';
        }, 2000);
    };
</script>