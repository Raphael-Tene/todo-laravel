<x-layout >
   {{-- create a welcome page for the app using tailwindcss - give a nice description for the app- be creative --}}
    <div class="bg-gray-900 rounded-lg p-4 mt-2">
        <h3 class="text-md  font-bold">Welcome to the Todo App</h3>
        <p class="mt-2 text-gray-400">This is a simple todo app that allows you to create, update and delete todos. You can also view all todos created by other users. You can only edit or delete todos that you created. You can also view your profile and logout from the app.</p>
    </div>
    <div class="mt-5">
        {{-- create a button that links to the todos page --}}
    <a href="/todos" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-4">View Todos</a>
    {{-- create a button that links to the create todo page --}}
    <a href="/todos/create" class="bg-green-500 text-white px-4 py-2 rounded-md mt-4">Create Todo</a>
    {{-- create a button that links to the profile page --}}
    <a href="/profile" class="bg-yellow-500 text-white px-4 py-2 rounded-md mt-4">View Profile</a>
    {{-- create a button that links to the login page --}}
    <a href="/login" class="bg-red-500 text-white px-4 py-2 rounded-md mt-4">Login</a>
    {{-- create a button that links to the register page --}}
    <a href="/register" class="bg-purple-500 text-white px-4 py-2 rounded-md mt-4">Register</a>
    {{-- create a button that logs out the user --}}
    <div class="mt-4">
    </div>
        Just trying out laravel
    </div>

</x-layout>
