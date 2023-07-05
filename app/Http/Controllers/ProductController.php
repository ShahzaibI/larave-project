<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
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
        $p = new Product();
        $products = $p->getActiveDataWithCategories()->paginate(3);
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
        $photo_name = $request->file('productImage')->getClientOriginalName();
        $path = $request->file('productImage')->storeAs('public/images', $photo_name);
        $Product_data = [];
        $Product_data['product_name'] = $request->name;
        $Product_data['product_description'] = $request->productDescription;
        $Product_data['price'] = $request->price;
        $Product_data['stock'] = $request->stock;
        $Product_data['product_image'] = $photo_name;
        $Product_data['product_sku'] = $request->skuNumber;
        $product = Product::create($Product_data);

        // Store data in junction table
        $category = Category::where('category_name', $request->productCategory)->first();
        $product->getCategories()->attach($category['id']);

        return redirect()->route('showProduct')->with('success', 'Product created successfully');
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
        $product = Product::with('getCategories')->where('id', $id)->first();
        $categories = Category::get();
        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        if($request->hasFile('productImage'))
        {
            $photo_name = $request->file('productImage')->getClientOriginalName();
            $path = $request->file('productImage')->storeAs('public/images', $photo_name);
        }
        else
        {
            $photo_name = $product->product_image;
        }
        $Product_data = [];
        $Product_data['product_name'] = $request->name;
        $Product_data['product_description'] = $request->productDescription;
        $Product_data['price'] = $request->price;
        $Product_data['stock'] = $request->stock;
        $Product_data['product_image'] = $photo_name;
        $Product_data['product_sku'] = $request->skuNumber;
        // dd($Product_data);
        $product->update($Product_data);
        $category_id = $request->productCategory;
        $product->getCategories()->sync($category_id);
        return redirect()->route('showProduct')->with('success', 'Product updated successfully');
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
        $p = new Product();
        $products = $p->getUnactiveDataWithCategories()->paginate(3);
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

    public function search(Request $request)
    {
        $search = $request->search;
        $p = new Product();
        $products = $p->getSearchedProducts($search)->paginate(3);
        return view('product.show', compact('products', 'search'));
    }
}

