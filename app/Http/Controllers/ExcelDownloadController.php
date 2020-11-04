<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelDownloadController extends Controller
{
    public function productDownload()
    {
        return Excel::download(new ProductExport,'products.xlsx');
    }
}
