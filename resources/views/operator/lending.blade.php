@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-md shadow-sm border border-gray-100 p-8 w-full">
    <!-- Header Area -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-[#03346E] text-xl font-bold mb-1">Lending Table</h2>
            <p class="text-gray-400 text-sm">Data of <span class="text-pink-400">.lendings</span></p>
        </div>
        <div class="flex space-x-3">
            <a href="#" class="bg-[#7854C0] hover:bg-purple-700 text-white px-5 py-2.5 rounded-md text-sm font-semibold shadow-sm transition">
                Export Excel
            </a>
            <a href="#" class="bg-[#1DD189] hover:bg-emerald-500 text-white px-5 py-2.5 rounded-md text-sm font-semibold inline-flex items-center shadow-sm transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                Add
            </a>
        </div>
    </div>

    <!-- Table Area -->
    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-100">
            <thead>
                <tr class="bg-white">
                    <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-semibold text-center w-16">#</th>
                    <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-semibold text-left">Item</th>
                    <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-semibold text-center">Total</th>
                    <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-semibold text-left">Name</th>
                    <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-semibold text-left">Ket.</th>
                    <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-semibold text-left">Date</th>
                    <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-semibold text-left">Returned</th>
                    <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-semibold text-left">Edited By</th>
                    <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-semibold text-center w-56">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lendings as $index => $row)
                <tr class="hover:bg-gray-50 transition border-b border-gray-100">
                    <td class="border border-gray-100 py-6 px-6 text-center text-gray-800 text-sm">{{ $index + 1 }}</td>
                    <td class="border border-gray-100 py-6 px-6 text-gray-800 text-sm">{{ $row['item'] }}</td>
                    <td class="border border-gray-100 py-6 px-6 text-center text-gray-800 text-sm">{{ $row['total'] }}</td>
                    <td class="border border-gray-100 py-6 px-6 text-gray-800 text-sm">{{ $row['name'] }}</td>
                    <td class="border border-gray-100 py-6 px-6 text-gray-800 text-sm">{{ $row['ket'] }}</td>
                    <td class="border border-gray-100 py-6 px-6 text-gray-800 text-sm">{{ $row['date'] }}</td>
                    <td class="border border-gray-100 py-6 px-6 text-center text-sm">
                        <span class="inline-block px-3 py-1.5 border border-yellow-400 text-yellow-500 bg-white rounded-sm text-xs font-semibold">
                            not returned
                        </span>
                    </td>
                    <td class="border border-gray-100 py-6 px-6 text-gray-900 text-sm font-bold">
                        {{ $row['edited_by'] }}
                    </td>
                    <td class="border border-gray-100 py-6 px-6 text-center">
                        <div class="flex items-center justify-center space-x-2">
                            <a href="#" class="bg-[#FBC335] hover:bg-yellow-500 text-gray-800 px-5 py-2.5 rounded text-sm font-medium inline-block transition shadow-sm">
                                Returned
                            </a>
                            <a href="#" class="bg-[#F04438] hover:bg-red-600 text-white px-5 py-2.5 rounded text-sm font-medium inline-block transition shadow-sm">
                                Delete
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
