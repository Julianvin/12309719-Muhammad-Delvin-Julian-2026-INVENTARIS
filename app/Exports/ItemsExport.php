<?php

namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ItemsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Item::with('category')->orderBy('id', 'asc')->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Category',
            'Name',
            'Total',
            'Available',
            'Repair',
            'Lending',
            'Updated At',
        ];
    }

    public function map($item): array
    {
        static $no = 0;
        $no++;

        return [
            $no,
            $item->category->name ?? '-',
            $item->name,
            strval($item->total ?? 0),
            strval(($item->total ?? 0) - ($item->repair ?? 0) - ($item->lending ?? 0)),
            strval($item->repair ?? 0),
            strval($item->lending ?? 0),
            $item->updated_at ? $item->updated_at->format('Y-m-d') : '-',
        ];
    }
}
