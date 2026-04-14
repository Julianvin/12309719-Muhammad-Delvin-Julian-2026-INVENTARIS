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
                @if (isset($isDetail) && $isDetail)
                    <a href="{{ $backUrl ?? url('/operator/items') }}"
                        class="px-8 py-2.5 bg-[#A0A3A8] hover:bg-gray-500 text-white font-bold text-[13px] rounded transition shadow-sm flex items-center justify-center">
                        Back
                    </a>
                @else
                    <a href="{{ url('/operator/lending/export') }}"
                        class="bg-[#7854C0] hover:bg-purple-700 text-white px-5 py-2.5 rounded-md text-sm font-semibold shadow-sm transition">
                        Export Excel
                    </a>
                    <a href="{{ url('/operator/lending/create') }}"
                        class="bg-[#1DD189] hover:bg-emerald-500 text-white px-5 py-2.5 rounded-md text-sm font-semibold inline-flex items-center shadow-sm transition">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Add
                    </a>
                @endif
            </div>
        </div>

        <!-- Alert Success -->
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
                        <th class="border border-gray-100 py-4 px-6 text-[#03346E] font-semibold text-center w-56">Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lendings as $index => $row)
                        <tr class="hover:bg-gray-50 transition border-b border-gray-100">
                            <td class="border border-gray-100 py-6 px-6 text-center text-gray-800 text-sm">
                                {{ $index + 1 }}</td>
                            <td class="border border-gray-100 py-6 px-6 text-gray-800 text-sm">{{ $row->item->name }}</td>
                            <td class="border border-gray-100 py-6 px-6 text-center text-gray-800 text-sm">
                                {{ $row->total }}</td>
                            <td class="border border-gray-100 py-6 px-6 text-gray-800 text-sm">{{ $row->name }}</td>
                            <td class="border border-gray-100 py-6 px-6 text-gray-800 text-sm">{{ $row->ket }}</td>
                            <td class="border border-gray-100 py-6 px-6 text-gray-800 text-sm">
                                {{ $row->created_at->format('d F, Y') }}</td>
                            <td class="border border-gray-100 py-6 px-6 text-center text-sm">
                                @if ($row->returned_at)
                                    <span
                                        class="inline-block px-3 py-1.5 border border-emerald-400 text-emerald-500 bg-white rounded-sm text-xs font-semibold whitespace-nowrap">
                                        returned ({{ $row->returned_at->format('d F, Y') }})
                                    </span>
                                @else
                                    <span
                                        class="inline-block px-3 py-1.5 border border-yellow-400 text-yellow-500 bg-white rounded-sm text-xs font-semibold whitespace-nowrap">
                                        not returned
                                    </span>
                                @endif
                            </td>
                            <td class="border border-gray-100 py-6 px-6 text-gray-900 text-sm font-bold">
                                <div>{{ $row->user->name }}</div>
                                @if ($row->different_user)
                                    <div class="text-xs text-gray-500 font-normal mt-1">
                                        <span class="">Dikembalikan oleh:</span> {{ $row->differentUser->name }}
                                    </div>
                                @endif
                            </td>
                            <td class="border border-gray-100 py-6 px-6 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    @if (!$row->returned_at)
                                        <form action="{{ url('/operator/lending/' . $row->id . '/return') }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="bg-[#FBC335] hover:bg-yellow-500 text-gray-800 px-5 py-2.5 rounded text-sm font-medium inline-block transition shadow-sm whitespace-nowrap">
                                                Returned
                                            </button>
                                        </form>
                                    @endif
                                    <form action="{{ url('/operator/lending/' . $row->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-[#F04438] hover:bg-red-600 text-white px-5 py-2.5 rounded text-sm font-medium inline-block transition shadow-sm whitespace-nowrap">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="mt-6">
            {{ $lendings->links() }}
        </div>
    </div>
@endsection
