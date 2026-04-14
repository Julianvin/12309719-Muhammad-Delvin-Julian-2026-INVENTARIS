@extends('layouts.admin')

@section('content')
<div class="bg-white rounded hover:shadow-sm transition-shadow p-8 w-full border border-gray-50 h-[calc(100vh-120px)] overflow-y-auto">
    <!-- Header -->
    <div class="mb-10">
        <h2 class="text-[#03346E] text-[22px] font-bold mb-2">Edit Item Forms</h2>
        <p class="text-[#7A8599] text-[15px]">Please modify properties of <span class="text-[#D66D92]">{{ $item->name }}</span>.</p>
    </div>

    <!-- Form -->
    <form action="{{ url('/admin/items/' . $item->id) }}" method="POST" class="space-y-8 max-w-5xl">
        @csrf
        @method('PUT')

        <!-- Name Field -->
        <div>
            <label for="name" class="block text-[#03346E] text-[17px] mb-3">Name</label>
            <div class="relative">
                <input type="text" id="name" name="name" value="{{ old('name', $item->name) }}" placeholder="Nama Item"
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

        <!-- Category Field -->
        <div>
            <label for="category_id" class="block text-[#03346E] text-[17px] mb-3">Category</label>
            <select id="category_id" name="category_id"
                    class="w-full border @error('category_id') border-red-500 @else border-[#F1F3F5] @enderror hover:border-gray-300 rounded-sm px-6 py-4 text-[15px] text-gray-800 outline-none focus:border-blue-400 transition-colors bg-white">
                <option value="" disabled>Pilih Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Total Field with Right Addon -->
        <div>
            <label for="total" class="block text-[#03346E] text-[17px] mb-3">Total</label>
            <div class="flex border @error('total') border-red-500 @else border-[#F1F3F5] @enderror hover:border-gray-300 focus-within:border-blue-400 rounded-sm overflow-hidden transition-colors">
                <!-- Input -->
                <input type="number" id="total" name="total" value="{{ old('total', $item->total) }}" placeholder="10"
                       class="flex-1 px-6 py-4 text-[15px] text-gray-800 outline-none bg-white placeholder-[#D1D5DB]" />

                <!-- Right Addon -->
                <div class="bg-[#F1F5F9] w-20 flex items-center justify-center border-l border-[#F1F3F5]">
                    <span class="text-[#9CA3AF] text-[15px]">item</span>
                </div>
            </div>
            @error('total')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- New Broke Item Field -->
        <div>
            <label for="broke_item" class="block text-[#03346E] text-[17px] mb-3">New Repair Item <span class="text-[#EAB308] text-sm">(currently: {{ $item->repair }})</span> <span class="text-emerald-500 text-sm">(available: {{ $item->total - $item->repair - $item->lending }})</span></label>
            <div class="flex border @error('broke_item') border-red-500 @else border-[#F1F3F5] @enderror hover:border-gray-300 focus-within:border-blue-400 rounded-sm overflow-hidden transition-colors">
                <!-- Input -->
                <input type="number" id="broke_item" name="broke_item" value="{{ old('broke_item', 0) }}" placeholder="0" min="0" max="{{ $item->total - $item->repair - $item->lending }}"
                       class="flex-1 px-6 py-4 text-[15px] text-gray-800 outline-none bg-white placeholder-[#D1D5DB]" />

                <!-- Right Addon -->
                <div class="bg-[#F1F5F9] w-20 flex items-center justify-center border-l border-[#F1F3F5]">
                    <span class="text-[#9CA3AF] text-[15px]">item</span>
                </div>
            </div>
            @error('broke_item')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="flex justify-end space-x-4 pt-10">
            <a href="{{ url('/admin/items') }}" class="bg-[#A1A1AA] hover:bg-gray-500 text-gray-900 px-10 py-3.5 rounded text-[15px] font-medium transition shadow-sm">
                Cancel
            </a>
            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-10 py-3.5 rounded text-[15px] font-medium transition shadow-sm">
                Update
            </button>
        </div>

    </form>
</div>
@endsection
