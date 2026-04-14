<?php

namespace App\Exports;

use App\Models\Lending;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LendingsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Lending::with(['item', 'user'])->get();
    }

    public function headings(): array
    {
        return [
            'Item',
            'Total',
            'Name',
            'Keterangan',
            'Date',
            'Return Date',
            'Status',
            'Edited By',
        ];
    }

    public function map($lending): array
    {
        return [
            $lending->item->name ?? 'N/A',
            $lending->total,
            $lending->name,
            $lending->ket,
            $lending->created_at->format('d F, Y'),
            $lending->returned_at ? $lending->returned_at->format('d F, Y') : '-',
            $lending->returned_at ? 'Returned' : 'Not Returned',
            $lending->user->name ?? 'N/A'
        ];
    }
}
