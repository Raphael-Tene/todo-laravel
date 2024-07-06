{{-- create a navigation bar using tailwind --}}
<nav class="bg-gray-800 shadow-sm">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <a href="#">
                        {{-- <img class="block lg:hidden h-8 w-auto" src="{{ asset('images/logo.png') }}" alt="Logo"> --}}
                        {{-- <img class="hidden lg:block h-8 w-auto" src="{{ asset('images/logo.png') }}" alt="Logo"> --}}
                    </a>
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <x-nav-link route='/'>
                            Home
                        </x-nav-link>
                        @auth
                        <x-nav-link route='todos/create'>
                            Create Todo
                        </x-nav-link>
                        <x-nav-link route='todos'>
                            Todos
                        </x-nav-link>
                        @endauth
                        
                    </div>
                </div>
            </div>
            <div >
                @auth()
                    <x-nav-link class="text-sm text-gray-300" route='profile'>
                   Hello     {{ auth()->user()->name }}
                    </x-nav-link>
                    
                    
                @endauth
            </div>
            <div class="hidden sm:block sm:ml-6">
                <div class="flex space-x-4">
                    @auth
                        <form method="POST" action="/logout">

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Logout</button>
                        </form>
                    @else
                        
                        <x-nav-link route='login'>
                            Login
                        </x-nav-link>
                        <x-nav-link route='register'>
                            Register
                        </x-nav-link>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
