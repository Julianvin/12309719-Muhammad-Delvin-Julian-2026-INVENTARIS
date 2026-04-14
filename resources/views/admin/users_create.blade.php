@extends('layouts.admin')

@section('content')
<div class="bg-white rounded hover:shadow-sm transition-shadow p-8 w-full border border-gray-50 h-[calc(100vh-120px)] overflow-y-auto">
    <!-- Header -->
    <div class="mb-10">
        <h2 class="text-[#03346E] text-[22px] font-bold mb-2">Add Account Forms</h2>
        <p class="text-[#7A8599] text-[15px]">Please <span class="text-[#D66D92]">.fill-all</span> input form with right value.</p>
    </div>

    <!-- Form -->
    <form action="{{ url('/admin/users') }}" method="POST" class="space-y-8 max-w-5xl">
        @csrf
        
        <!-- Name Field -->
        <div>
            <label for="name" class="block text-[#03346E] text-[17px] mb-3">Name</label>
            <div class="relative">
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Fema Flamelina Putri" 
                       class="w-full border @error('name') border-red-500 @else border-[#F1F3F5] @enderror hover:border-gray-300 rounded-sm px-6 py-4 text-[15px] text-gray-800 outline-none focus:border-blue-400 placeholder-[#D1D5DB] transition-colors" />
                @error('name')
                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                @enderror
            </div>
            @error('name')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email Field -->
        <div>
            <label for="email" class="block text-[#03346E] text-[17px] mb-3">Email</label>
            <div class="relative">
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="femaflam22@gmail.com" 
                       class="w-full border @error('email') border-red-500 @else border-[#F1F3F5] @enderror hover:border-gray-300 rounded-sm px-6 py-4 text-[15px] text-gray-800 outline-none focus:border-blue-400 placeholder-[#D1D5DB] transition-colors" />
                @error('email')
                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                @enderror
            </div>
            @error('email')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Role Field -->
        <div>
            <label for="role" class="block text-[#03346E] text-[17px] mb-3">Role</label>
            <select id="role" name="role" 
                    class="w-full border @error('role') border-red-500 @else border-[#F1F3F5] @enderror hover:border-gray-300 rounded-sm px-6 py-4 text-[15px] text-[#A0AABF] outline-none focus:border-blue-400 transition-colors bg-white">
                <option value="" selected disabled>Select Role</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>admin</option>
                <option value="operator" {{ old('role') == 'operator' ? 'selected' : '' }}>operator</option>
            </select>
            @error('role')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="flex justify-end space-x-4 pt-10">
            <a href="{{ url()->previous() }}" class="bg-[#A1A1AA] hover:bg-gray-500 text-gray-900 px-10 py-3.5 rounded text-[15px] font-medium transition shadow-sm">
                Cancel
            </a>
            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-10 py-3.5 rounded text-[15px] font-medium transition shadow-sm">
                Submit
            </button>
        </div>

    </form>
</div>
@endsection
