<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    protected $role;

    public function __construct($role)
    {
        $this->role = $role;
    }

    public function collection()
    {
        return User::where('role', $this->role)->orderBy('id', 'asc')->get();
    }

    //

    public function headings(): array
    {
        return [
            'No',
            'Name',
            'Email',
            'Role',
            'Password',
        ];
    }

    public function map($user): array
    {
        static $no = 0;
        $no++;

        return [
            $no,
            $user->name,
            $user->email,
            $user->role,
            $user->plain_password ?? 'This account already edited the password',
        ];
    }
}
