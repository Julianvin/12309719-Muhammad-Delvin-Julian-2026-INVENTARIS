@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-md shadow-sm border border-gray-100 p-8 w-full max-w-7xl mx-auto">
    <!-- Header -->
    <div class="mb-10">
        <h2 class="text-[#03346E] text-[18px] font-bold mb-1.5">Lending Form</h2>
        <p class="text-[#8492A6] text-sm font-medium">Please <span class="text-pink-400">.fill-all</span> input form with right value.</p>
    </div>

    <!-- Alert for Stock Validation -->
    @if(session('error'))
    <div class="mb-6 bg-red-100 border-l-4 border-red-500 p-4 rounded shadow-sm">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-red-800">
                    {{ session('error') }}
                </p>
            </div>
        </div>
    </div>
    @endif

    <!-- Form -->
    <form action="{{ url('/operator/lending') }}" method="POST" x-data="{
            rows: [{ id: Date.now() }],
            addRow() {
                this.rows.push({ id: Date.now() });
            },
            removeRow(id) {
                this.rows = this.rows.filter(row => row.id !== id);
            }
        }">
        @csrf
        <div class="space-y-8">
            <!-- Name -->
            <div>
                <label class="block text-[#03346E] font-bold text-[13px] mb-3">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" class="w-full px-5 py-3.5 rounded-[4px] border border-gray-100 focus:outline-none focus:ring-1 focus:ring-[#6640AD] text-gray-700 bg-white placeholder-gray-300 font-medium text-sm">
            </div>

            <!-- Dynamic Fields Container -->
            <div class="space-y-8">
                <template x-for="(row, index) in rows" :key="row.id">
                    <div class="relative space-y-8">
                        
                        <!-- Remove Button (visible for added rows) -->
                        <button type="button" x-show="index > 0" @click="removeRow(row.id)" class="absolute right-0 top-0 text-gray-400 hover:text-[#F04438] transition focus:outline-none z-10 p-1" title="Remove Item">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>

                        <!-- Items -->
                        <div class="relative">
                            <label class="block text-[#03346E] font-bold text-[13px] mb-3">Items</label>
                            
                            <select name="items[]" class="w-full px-5 py-3.5 rounded-[4px] border border-gray-100 focus:outline-none focus:ring-1 focus:ring-[#6640AD] text-gray-400 font-medium text-sm bg-white appearance-none">
                                <option value="" disabled selected>Select Items</option>
                                @foreach($items as $item)
                                <option value="{{ $item->id }}" class="text-gray-700">{{ $item->name }} (Available: {{ $item->total - $item->repair - $item->lending }})</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Total -->
                        <div>
                            <label class="block text-[#03346E] font-bold text-[13px] mb-3">Total</label>
                            <input type="number" name="totals[]" placeholder="total item" class="w-full px-5 py-3.5 rounded-[4px] border border-gray-100 focus:outline-none focus:ring-1 focus:ring-[#6640AD] text-gray-700 bg-white placeholder-gray-300 font-medium text-sm">
                        </div>
                    </div>
                </template>
            </div>

            <!-- More Button -->
            <div>
                <button type="button" @click="addRow" class="text-[#32C5D2] hover:text-[#259EA9] font-bold text-[13px] flex items-center focus:outline-none transition">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    More
                </button>
            </div>

            <!-- Ket -->
            <div>
                <label class="block text-[#03346E] font-bold text-[13px] mb-3">Ket.</label>
                <textarea name="ket" rows="4" class="w-full px-5 py-3.5 rounded-[4px] border border-gray-100 focus:outline-none focus:ring-1 focus:ring-[#6640AD] text-gray-700 bg-white font-medium text-sm">{{ old('ket') }}</textarea>
            </div>
        </div>

        <!-- Buttons -->
        <div class="mt-10 flex justify-start space-x-3">
            <button type="submit" class="px-8 py-2.5 bg-[#6640AD] hover:bg-purple-800 text-white font-bold text-[13px] rounded transition shadow-sm">
                Submit
            </button>
            <a href="{{ url('/operator/lending') }}" class="px-8 py-2.5 bg-white hover:bg-gray-50 text-[#8492A6] font-bold text-[13px] rounded transition border border-gray-100 flex items-center justify-center shadow-sm">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
