@extends('layouts.admin')

@section('content')
    <div class="bg-white rounded-md shadow-sm border border-gray-100 p-8 w-full">
        <!-- Header Area -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-[#03346E] text-xl font-bold mb-1">Items Table</h2>
                <p class="text-gray-400 text-sm">Add, delete, update <span class="text-pink-400">.items</span></p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ url('/admin/items/export') }}"
                    class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-2.5 rounded-md text-sm font-semibold shadow-sm transition">
                    Export Excel
                </a>
                <a href="{{ url('/admin/items/create') }}"
                    class="bg-emerald-500 hover:bg-emerald-600 text-white px-5 py-2.5 rounded-md text-sm font-semibold inline-flex items-center shadow-sm transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
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
                        <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-semibold text-left">Category</th>
                        <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-semibold text-left">Name</th>
                        <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-semibold text-center">Total</th>
                        <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-semibold text-center">Available</th>
                        <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-semibold text-center">Repair</th>
                        <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-semibold text-center">Lending</th>
                        <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-semibold text-center w-32">Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $index => $item)
                        <tr class="hover:bg-gray-50 transition border-b border-gray-100">
                            <td class="border border-gray-100 py-6 px-6 text-center text-gray-800 text-sm">
                                {{ $index + 1 }}</td>
                            <td class="border border-gray-100 py-6 px-6 text-gray-800 text-sm">
                                {{ $item->category->name ?? '-' }}</td>
                            <td class="border border-gray-100 py-6 px-6 text-gray-800 text-sm">{{ $item->name }}</td>
                            <td class="border border-gray-100 py-6 px-6 text-center text-gray-800 text-sm">
                                {{ $item->total }}</td>
                            <td
                                class="border border-gray-100 py-6 px-6 text-center text-sm font-medium {{ $item->total - $item->repair - $item->lending <= 0 ? 'text-red-500' : 'text-emerald-600' }}">
                                {{ $item->total - $item->repair - $item->lending }}</td>
                            <td class="border border-gray-100 py-6 px-6 text-center text-gray-800 text-sm">
                                {{ $item->repair }}</td>
                            <td class="border border-gray-100 py-6 px-6 text-center text-sm font-bold">
                                @if ($item->lending > 0)
                                    <a href="{{ url('/admin/items/lending/detail/' . $item->id) }}"
                                        class="text-blue-600 hover:text-blue-800 underline transition duration-150 ease-in-out">
                                        {{ $item->lending }}
                                    </a>
                                @else
                                    <span class="text-gray-800">{{ $item->lending }}</span>
                                @endif
                            </td>
                            <td class="border border-gray-100 py-6 px-6 text-center">
                                <a href="{{ url('/admin/items/' . $item->id . '/edit') }}"
                                    class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2.5 rounded text-sm font-medium inline-block transition shadow-sm">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $items->links() }}   
            </div>
        </div>
    @endsection
