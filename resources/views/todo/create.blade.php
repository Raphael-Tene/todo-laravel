<x-layout>
    <p>To Create</p>

    <form action="{{ route('todos.store') }}" method="POST" class="mt-4">
        @csrf

        <div class="mb-4">
            <x-form-label>Title:</x-form-label>
            <x-form-input required  type='text' placeholder='What do you want to do?' 
            id="title" name='title' value="{{ old('title') }}" class="{{ $errors->has('title') ? 'border-red-500 shadow appearance-none border rounded w-full
            py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' : 'shadow appearance-none border rounded w-full
            py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' }}"/>
            @error('title')
                <p class="text-red-500 text-xs mt-2 italic">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-4">
            <x-form-label>Status:</x-form-label>
            <select required  id="status" name="status" class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 {{ $errors->has('status') ? 'border-red-500' : '' }}">
                <option value="new" {{ old('status') == 'new' ? 'selected' : '' }}>New</option>
                <option value="in progress" {{ old('status') == 'in progress' ? 'selected' : '' }}>In Progress</option>
                <option value="done" {{ old('status') == 'done' ? 'selected' : '' }}>Done</option>
            </select>
            @error('status')
                <p class="text-red-500 text-xs mt-2 italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create</button>
        </div>
    </form>


</x-layout>