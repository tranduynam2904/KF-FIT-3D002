<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductCategory extends Controller
{
    public function index()
    {
        $productCategories = DB::select('select * from product_categories');

        return view('admin.pages.product_category.list',['productCategories' => $productCategories]);
    }
    public function add()
    {
        return view('admin.pages.product_category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255|unique:product_categories,name',
            'status' => 'required'

        ], [
            'name.required' => 'Vui long nhap',
            'name.min' => 'Nhap toi thieu 3 ky tu',
            'name.max' => 'Nhap toi da 255 ky tu',

        ]);
        $bool = DB::insert('INSERT INTO `product_categories` ( name, status, created_at, updated_at) VALUES (?,?,?,?)', [
            $request->name,
            $request->status,
            Carbon::now(+7),
            Carbon::now(+7)
        ]);
        $message = $bool ? 'thanh cong' : 'that bai';
        return redirect()->route('admin.product_categories.list')->with('message', $message);
        // dd($request->all());
        // $name = $request->name;

        // dd($name);
    }
    public function detail(){
        dd(1);
    }
}
