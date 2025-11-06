<?php


namespace App\Exports;


use App\Models\Guest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class GuestExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Guest::orderBy('created_at', 'desc')->get();
    }


    public function headings(): array
    {
        return [
        '   ID', 'Nama', 'Email', 'Telepon', 'Pesan', 'Check In', 'Check Out', 'Status'
        ];
    }


    public function map($guest): array
    {
        return [
            $guest->id,
            $guest->name,
            $guest->email,
            $guest->phone,
            $guest->message,
            optional($guest->check_in_at)->format('Y-m-d H:i:s'),
            optional($guest->check_out_at)->format('Y-m-d H:i:s'),
            $guest->status,
        ];
    }
}
