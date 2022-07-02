<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;

class ExcelController extends Controller
{
    public function exportUser(){
        return Excel::download(new UserExport, 'users.xlsx');
    }
}
