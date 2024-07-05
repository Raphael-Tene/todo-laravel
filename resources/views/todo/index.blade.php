<x-layout>
    @if($todos->isEmpty())
    <p class="text-center font-bold text-xl">You don't have any todos</p>
@else
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($todos->groupBy('status') as $status => $todosGroup)
            <div class="mb-4 shadow-sm">
                @php
                    $color = match($status) {
                        'new' => 'text-red-300',
                        'in progress' => 'text-yellow-300',
                        'done' => 'text-green-300',
                        default => 'text-black',
                    };
                @endphp
                <h2 class="text-2xl {{ $color }} font-bold">{{ ucfirst($status) }}</h2>
                @foreach($todosGroup as $todo)
                    <a href="{{ url('todos/' . $todo['id']) }}">
                        <div class="bg-gray-900 rounded-lg p-4 mt-2">
                            <h3 class="text-md  font-bold">{{$todo['title']}}</h3>
                            <div class="flex justify-between mt-2">
                                <small class="ml-2 text-sm text-gray-600">{{ optional($todo->created_at)->format('j M Y, g:i a') }}</small>
                                <small class="text-gray-400">{{$todo->user->name}}</small>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endforeach
    </div>
    {{ $todos->links() }}
@endif

@if (session('message'))
    <div id="alert" class="bg-red-100 border w-96 mt-16 border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
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