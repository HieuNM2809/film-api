<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    private $column = [];
    private $columnHeader = [];
    public function __construct()
    {
        $this->column =[
            'name',
            'email',
            'identity_card',
            'birthday',
            'url',
            'location',
            'bio',
            'skills',
            'work',
            'education'
        ];
        $this->columnHeader =[
            'Tên',
            'Email',
            'CMND',
            'Ngày sinh',
            'URL',
            'Vị trí',
            'Giới thiệu',
            'Kỹ năng',
            'Công ty',
            'Trường học'
        ];
    }
    public function headings(): array
    {
        return $this->columnHeader;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select($this->column)->get();
    }
}
