<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {

        return view('product.dashboard');
    }
    public function index()
    {
        // $products = DB::table('products')->join('product_category', 'products.id', '=', 'product_category.product_id')->join('categories', 'product_category.category_id', '=', 'categories.id')->select('products.*', 'categories.*')->where('products.archive', 0)->get();

        $products = Product::active()->with('getCategories')->paginate(3);
        // $request_params = $products;
        // echo "<pre>";
        // print_r($request_params);
        // die();
        // echo json_encode($products);
        // dd($products);
        return view('product.show', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        dd('ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        // dd($product);
        $product->update([
            'archive' => 1
        ]);
        return redirect()->route('showProduct')->with('success', 'Product archived successfully');
    }


    public function archive()
    {
        // $request_params = $products;
        // echo "<pre>";
        // print_r($request_params);
        // die();
        // echo json_encode($products);
        // dd($products);
        $products = Product::unActive()->with('getCategories')->paginate(3);
        return view('product.archive', compact('products'));
    }
    public function unArchive($id)
    {
        $product = Product::find($id);
        // dd($product);
        $product->update([
            'archive' => 0
        ]);
        return redirect()->route('showArchiveProduct')->with('success', 'Product Unarchive successfully');
    }
}
