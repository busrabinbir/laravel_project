<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $product = DB::table('products')
            ->join('users','users.id','=', 'products.created_by')
            ->select('users.name as user_name','products.name as product_name','products.price as product_price')
            ->where('products.is_approve','=',1)->get();
        return $product;
    }

    public function headings(): array
    {
        return [
            'Kullanıcı adı',
            'Ürün adı',
            'Ürün fiyatı',
        ];
    }
}
