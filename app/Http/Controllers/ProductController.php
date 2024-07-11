<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    const PATH_VIEW = 'products.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = DB::table('product')
            ->join('category', 'product.category_id', '=', 'category.id')
            ->select('product.id', 'product.name', 'product.price', 'product.view', 'category.name as category_name')
            ->orderBy('view', 'desc')
            ->get();

        return view(self::PATH_VIEW . __FUNCTION__, compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function search(Request $request)
    {
        $data = $request->all();

        $products = DB::table('product')
            ->join('category', 'product.category_id', '=', 'category.id')
            ->select('product.id', 'product.name', 'product.price', 'product.view', 'category.name as category_name')
            ->where('product.name', 'like', '%' . $data['search'] . '%')
            ->orderBy('view', 'desc')
            ->get();

        return view(self::PATH_VIEW . 'index', compact('products'));
    }
    public function create()
    {
        $categories = DB::table('category')->get();

        return view(self::PATH_VIEW . __FUNCTION__, compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required | numeric',
            'view' => 'required | numeric',
        ], [
            'name.required' => 'Truong nay bat buoc nhap!'
        ]);

        $insertProduct = [
            'name' => $data['name'],
            'category_id' => $data['category_id'],
            'price' => $data['price'],
            'view' => $data['view'],
            'create_at' => Carbon::now(),
            'update_at' => Carbon::now(),
        ];

        DB::table('product')->insert($insertProduct);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = DB::table('product')
            ->join('category', 'product.category_id', '=', 'category.id')
            ->select('product.id', 'product.name', 'product.price', 'product.view', 'category.name as category_name', 'product.category_id')
            ->where('product.id', $id)
            ->first();

        $categories = DB::table('category')->get();

        return view(self::PATH_VIEW . __FUNCTION__, compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required | numeric',
            'view' => 'required | numeric',
        ]);

        $updateProduct = [
            'name' => $data['name'],
            'category_id' => $data['category_id'],
            'price' => $data['price'],
            'view' => $data['view'],
            'update_at' => Carbon::now(),
        ];

        DB::table('product')->where('id', $id)->update($updateProduct);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('product')->where('id', $id)->delete();

        return redirect()->route('products.index');
    }
}
