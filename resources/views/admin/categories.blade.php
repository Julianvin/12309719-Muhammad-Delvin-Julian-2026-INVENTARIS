@extends('layouts.admin')

@section('content')
    @if (session('success'))
        <div class="mb-6 bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r shadow-sm">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-emerald-800">
                        {{ session('success') }}
                    </p>
                </div>
            </div>
        </div>
    @endif
    <div class="bg-white rounded-md shadow-sm border border-gray-100 p-8 w-full">
        <!-- Header Area -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-[#03346E] text-xl font-bold mb-1">Categories Table</h2>
                <p class="text-gray-400 text-sm">Add, delete, update <span class="text-pink-400">.categories</span></p>
            </div>
            <div>
                <a href="{{ url('/admin/categories/create') }}"
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
                        <th
                            class="border border-gray-100 py-4 px-6 text-[#03346E] font-medium text-center font-semibold w-16">
                            #</th>
                        <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-medium text-left font-semibold">Name
                        </th>
                        <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-medium text-left font-semibold">
                            Division PJ</th>
                        <th
                            class="border border-gray-100 py-4 px-6 text-[#03346E] font-medium text-center font-semibold w-32">
                            Total Items</th>
                        <th
                            class="border border-gray-100 py-4 px-6 text-[#03346E] font-medium text-center font-semibold w-32">
                            Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $category)
                        <tr class="hover:bg-gray-50 transition border-b border-gray-100">
                            <td class="border border-gray-100 py-8 px-6 text-center text-gray-800 text-sm">
                                {{ $index + 1 }}</td>
                            <td class="border border-gray-100 py-8 px-6 text-gray-800 text-sm font-medium">
                                {{ $category->name }}</td>
                            <td class="border border-gray-100 py-8 px-6 text-gray-800 text-sm">{{ $category->division_pj }}
                            </td>
                            <td class="border border-gray-100 py-8 px-6 text-center text-gray-800 text-sm">
                                {{ $category->items_sum_total ?? 0 }}</td>
                            <td class="border border-gray-100 py-8 px-6 text-center">
                                <a href="{{ url('/admin/categories/' . $category->id . '/edit') }}"
                                    class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2.5 rounded text-sm font-medium inline-block transition shadow-sm">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
