@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-md shadow-sm border border-gray-100 p-8 w-full">
    <!-- Header -->
    <div class="mb-8">
        <h2 class="text-[#03346E] text-xl font-bold mb-1">Edit Account Forms</h2>
        <p class="text-gray-400 text-sm">Please <span class="text-pink-400">.fill-all</span> input form with right value.</p>
    </div>

    <!-- Alert Success -->
    @if(session('success'))
    <div class="mb-6 bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r shadow-sm text-emerald-800 font-medium">
        {{ session('success') }}
    </div>
    @endif

    <!-- Form -->
    <form action="{{ url('/operator/users/edit') }}" method="POST" class="max-w-full">
        @csrf
        <div class="space-y-6">
            <!-- Name -->
            <div>
                <label class="block text-[#03346E] font-medium mb-3 @error('name') text-red-500 @enderror">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full px-4 py-3.5 rounded-md border @error('name') border-red-500 @else border-gray-100 @enderror focus:outline-none focus:ring-1 focus:ring-blue-500 text-gray-700 bg-white">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-[#03346E] font-medium mb-3 @error('email') text-red-500 @enderror">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-4 py-3.5 rounded-md border @error('email') border-red-500 @else border-gray-100 @enderror focus:outline-none focus:ring-1 focus:ring-blue-500 text-gray-700 bg-white">
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-[#03346E] font-medium mb-3 @error('password') text-red-500 @enderror">
                    New Password <span class="text-amber-400 text-sm font-normal ml-1">optional</span>
                </label>
                <input type="password" name="password" class="w-full px-4 py-3.5 rounded-md border @error('password') border-red-500 @else border-gray-100 @enderror focus:outline-none focus:ring-1 focus:ring-blue-500 bg-white">
                @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Buttons -->
        <div class="mt-10 flex justify-end space-x-3">
            <a href="{{ url('/operator/dashboard') }}" class="px-8 py-3 bg-[#A0A3A8] hover:bg-gray-500 text-gray-800 font-medium rounded transition shadow-sm">
                Cancel
            </a>
            <button type="submit" class="px-8 py-3 bg-[#6640AD] hover:bg-purple-800 text-white font-medium rounded transition shadow-sm">
                Submit
            </button>
        </div>
    </form>
</div>
@endsection
