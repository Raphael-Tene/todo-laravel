<x-layout>
   
    <div class="container w-full mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-1/3">
                <h1 class="text-2xl text-gray-700 font-semibold mb-4">Editing Todo with id: {{ $todo->id }}</h1>
                <form action="/todos/{{ $todo->id }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                        <x-form-label>Title:</x-form-label>
                        <x-form-input required  type='text' placeholder='What do you want to do?' 
                        id="title" name='title' value="{{ $todo->title }}" class="{{ $errors->has('title') ? 'border-red-500 shadow appearance-none border rounded w-full
                        py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' : 'shadow appearance-none border rounded w-full
                        py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' }}"/>
                        @error('title')
                            <p class="text-red-500 text-xs mt-2 italic">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <x-form-label>Status:</x-form-label>
                        <select name="status" id="status" class="mt-1 block w-full px-3 text-gray-700 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="new" {{ $todo->status == 'new' ? 'selected' : '' }}>New</option>
                            <option value="in progress" {{ $todo->status == 'in progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="done" {{ $todo->status == 'done' ? 'selected' : '' }}>Done</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs mt-2 italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <a href="/todos/{{ $todo->id }}" class="bg-gray-500 inline-block text-white px-4 py-2 rounded-md">Cancel</a>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update</button>
                        
                    </div>
                </form>
                <div class="w-full flex">
                    <form class="w-full flex justify-end" method="POST" action="/todos/{{ $todo->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500  text-white px-4 py-2  rounded-md">Delete</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
   
</x-layout>


