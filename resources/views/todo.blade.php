<x-layout>
   
    <div class="bg-gray-900 rounded-lg p-4 mt-2">
        <h3 class="text-md  font-bold">{{$todo['title']}}</h3>
        <div class="flex justify-between mt-2">
            <small class="ml-2 text-sm text-gray-600">{{ optional($todo->created_at)->format('j M Y, g:i a') }}</small>
            <small class="text-gray-400">{{$todo->user->name}}</small>
        </div>
        
    </div>
</x-layout>
