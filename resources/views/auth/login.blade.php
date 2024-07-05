<x-layout>
    {{-- create a registration form with username, email, password, and confirm password inputs using tailwindcss  --}}




    <div class="flex justify-center items-center h-[100vh]">
        <div class="w-4/12 h-fit bg-white p-6 rounded-lg">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your email" class="bg-gray-100 text-gray-700 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" class="bg-gray-100 text-gray-700 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="{{ old('password') }}">
                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div>
                    <button type="submit" class="bg-gray-700 text-white px-4 py-3 rounded font-medium w-full">Log In</button>
                </div>
            </form>
        </div>
    </div>

</x-layout>