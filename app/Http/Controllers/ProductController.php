<?php

namespace App\Http\Controllers;

use App\Helpers\UploadPaths;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function productCreateView()
    {
        return view('products.create');
    }

    public function productCreate(Request $request)
    {
        $name = $request->get('name');
        $price = $request->get('price');
        $filePhotoUrl = $request->file('photo');
        $user = User::find(1);

        if(isset($filePhotoUrl))
        {
            $productPhotoName = uniqid('product_').'.'.$filePhotoUrl->getClientOriginalExtension();
            $filePhotoUrl->move(UploadPaths::getUploadPath('product_photos'), $productPhotoName);
        }

        Product::create([
            'name' => $name,
            'price' => $price,
            'is_approve' => false,
            'photo' => $productPhotoName,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ]);

        return 'Ürün başarıyla eklendi';
    }

    public function indexView()
    {
        $products = DB::table('products')
            ->join('users', 'users.id','=', 'products.created_by')
            ->select('products.name as name','products.price as price','products.photo as photo','users.name as user_name')
            ->where('products.deleted_at','=',null)->get();
        return view('products.index', compact('products'));
    }

}
