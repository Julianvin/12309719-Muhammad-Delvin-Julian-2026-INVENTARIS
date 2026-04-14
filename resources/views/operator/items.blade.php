@extends('layouts.admin')

@section('content')
    <div class="bg-white rounded-md shadow-sm border border-gray-100 p-8 w-full">
        <!-- Header Area -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-[#03346E] text-xl font-bold mb-1">Items Table</h2>
                <p class="text-gray-400 text-sm">Data <span class="text-pink-400">.items</span></p>
            </div>
        </div>

        <!-- Table Area -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-100">
                <thead>
                    <tr class="bg-white border-b border-gray-100">
                        <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-semibold text-center w-16">#</th>
                        <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-semibold text-left">Category</th>
                        <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-semibold text-left">Name</th>
                        <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-semibold text-center">Total</th>
                        <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-semibold text-center">Available</th>
                        <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-semibold text-center">Lending Total
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $index => $item)
                        <tr class="hover:bg-gray-50 transition border-b border-gray-100">
                            <td class="border border-gray-100 py-6 px-6 text-center text-[#03346E] text-sm">
                                {{ $index + 1 }}</td>
                            <td class="border border-gray-100 py-6 px-6 text-[#03346E] text-sm">{{ $item->category->name }}
                            </td>
                            <td class="border border-gray-100 py-6 px-6 text-[#03346E] text-sm">{{ $item->name }}</td>
                            <td class="border border-gray-100 py-6 px-6 text-center text-gray-800 text-sm">
                                {{ $item->total }}</td>
                            <td class="border border-gray-100 py-6 px-6 text-center text-gray-800 text-sm">
                                {{ $item->total - $item->repair - $item->lending }}
                            </td>
                            <td class="border border-gray-100 py-6 px-6 text-center text-[#03346E] text-sm">
                                {{ $item->lending }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $items->links() }}
            </div>
        </div>
    </div>
@endsection
