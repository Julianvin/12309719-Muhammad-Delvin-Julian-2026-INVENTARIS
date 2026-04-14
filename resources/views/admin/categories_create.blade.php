@extends('layouts.admin')

@section('content')
<div class="bg-white rounded hover:shadow-sm transition-shadow p-8 w-full border border-gray-50 h-full">
    <!-- Header -->
    <div class="mb-8">
        <h2 class="text-[#03346E] text-[22px] font-bold mb-2">Add Category Forms</h2>
        <p class="text-[#7A8599] text-[15px]">Please <span class="text-[#D66D92]">.fill-all</span> input form with right value.</p>
    </div>

    <!-- Form -->
    <form action="{{ url('/admin/categories') }}" method="POST" class="space-y-8 max-w-4xl">
        @csrf
        
        <!-- Name Field -->
        <div>
            <label for="name" class="block text-[#012652] text-lg font-semibold mb-3">Name</label>
            <div class="relative">
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Alat Dapur" 
                       class="w-full border @error('name') border-red-500 @else border-[#F1F3F5] @enderror rounded-sm px-5 py-4 text-[15px] text-gray-800 outline-none focus:border-gray-200 placeholder-gray-300" />
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

        <!-- Division PJ Field -->
        <div>
            <label for="division" class="block text-[#012652] text-lg font-semibold mb-3">Division PJ</label>
            <div class="relative">
                <div class="flex border @error('division') border-red-500 @else border-[#A6C4E1] @enderror rounded-sm bg-white overflow-hidden focus-within:border-blue-400 transition-colors">
                    <!-- Icon Addon -->
                    <div class="bg-[#EBEFF4] w-14 flex items-center justify-center border-r @error('division') border-red-500 @else border-[#A6C4E1] @enderror">
                        <svg class="w-4 h-4 text-[#A0AABF]" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                    <!-- Select -->
                    <select id="division" name="division" class="flex-1 px-5 py-4 text-[15px] text-[#334155] outline-none">
                        <option value="">Select Division PJ</option>
                        <option value="Sarpras" {{ old('division') == 'Sarpras' ? 'selected' : '' }}>Sarpras</option>
                        <option value="Tata Usaha" {{ old('division') == 'Tata Usaha' ? 'selected' : '' }}>Tata Usaha</option>
                        <option value="tefa" {{ old('division') == 'tefa' ? 'selected' : '' }}>tefa</option>
                    </select>
                </div>
                @error('division')
                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                @enderror
            </div>
            @error('division')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Buttons Area -->
        <div class="flex justify-end space-x-4 pt-4">
            <a href="{{ url('/admin/categories') }}" class="bg-[#A0AABF] hover:bg-gray-500 text-white px-8 py-3 rounded-md font-semibold transition shadow-md">
                Cancel
            </a>
            <button type="submit" class="bg-[#5D45B0] hover:bg-purple-800 text-white px-10 py-3 rounded-md font-semibold transition shadow-md">
                Submit
            </button>
        </div>

    </form>
</div>
@endsection
