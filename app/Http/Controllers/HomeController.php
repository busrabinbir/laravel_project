<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function getUsers(){
        return User::all();
    }

    public function indexView() {
        /*$users = DB::table('users')->where('deleted_at', '=', null)->get();

        $products = DB::table('users')
            ->join('products','products.created_by','=','users.id')
            ->select('products.name as product_name', 'users.name as user_name')
            ->get();

        return view('users.index', compact('users', 'products'));*/
        $users = User::where('deleted_at','=',null)->get();
        return view('users.index', compact('users'));
    }

    public function index(){
        return view('home');
    }

    public function createView()
    {
        return view('users.create');
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $password = $request->get('password');
        //dd($data);
        DB :: table('users')->insert([
           'name' => $request->get('name'),
           //ilk name db'den gelen namedir get'ten sonraki name bizim yazdığımız değiştirilebilir
           'email' => $request->get('email'),
           //'password' => $request->get('password')
            'password' =>Hash::make($password)
        ]);
        return 'Kayıt başarıyla tamamlandı!';
    }

    public function updateView($id){
        $user = User::where('id', $id)->get();
        $user = $user->first();
        return view('users.update', compact('user'));
    }

    public function update(Request $request, $id){
        User::where('id', $id)->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'updated_at' => Carbon::now()
        ]);
        return 'Başarıyla güncellendi!';
    }

    public function delete($id){
        /*$user =*/ //DB::table('users')->where('id', '=', $id)->delete();//Hard Delete:veriyi kalıcı siler. Tavsiye edilmez
        DB::table('users')->where('id', '=', $id)->update([
            'deleted_at' => Carbon::now()
        ]);
        //return $user->first()->name;
        //return $user;
        return 'Başarıyla silindi!';
    }
}
