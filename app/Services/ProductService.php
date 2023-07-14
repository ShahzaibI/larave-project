<?php
namespace App\Http\Controllers;
namespace App\Services;
use App\Models\Category;
use App\Models\Product;

class ProductService
{
    public function dashboard()
    {
        return view('product.dashboard');
    }

    public function index()
    {
        // $products = DB::table('products')->join('product_category', 'products.id', '=', 'product_category.product_id')->join('categories', 'product_category.category_id', '=', 'categories.id')->select('products.*', 'categories.*')->where('products.archive', 0)->get();
        // $product = new Product();
        // $products = $product->getActiveDataWithCategories()->paginate(3);
        $models = new Config();
        $products = $models->getProductModel()->getActiveDataWithCategories()->paginate(3);
        return view('product.show', compact('products'));
    }

    public function create()
    {
        // $category = new Category();
        // $categories = $category->getCategories();
        $models = new Config();
        $categories = $models->getCategoryModel()->getCategories();
        return view('product.create', compact('categories'));
    }

    public function store($request)
    {
        $models = new Config();
        $photo_name = $request->file('productImage')->getClientOriginalName();
        $path = $request->file('productImage')->storeAs('public/images', $photo_name);
        $Product_data = [];
        $Product_data['product_name'] = $request->name;
        $Product_data['product_description'] = $request->productDescription;
        $Product_data['price'] = $request->price;
        $Product_data['stock'] = $request->stock;
        $Product_data['product_image'] = $photo_name;
        $Product_data['product_sku'] = $request->skuNumber;
        $product = $models->getProductModel()->create($Product_data);

        // Store data in junction table
        $category_id = $request->productCategory;
        $product->getCategories()->attach($category_id);

        return redirect()->route('showProduct')->with('success', 'Product created successfully');
    }

    public function edit($id)
    {
        // $product = new Product();
        // $product_data = $product->getActiveProductsById($id);
        $models = new Config();
        $product_data = $models->getProductModel()->getActiveProductsById($id);

        // dd($product_data);
        // $category = new Category();
        // $categories = $category->getCategories();
        $categories = $models->getCategoryModel()->getCategories();
        return view('product.edit', compact('product_data', 'categories'));
    }

    public function update($request, $id)
    {
        // $product = new Product();
        // $currentProduct = $product->findProduct($id);
        $models = new Config();
        $currentProduct = $models->getProductModel()->findProduct($id);
        if($request->hasFile('productImage'))
        {
            $photo_name = $request->file('productImage')->getClientOriginalName();
            $path = $request->file('productImage')->storeAs('public/images', $photo_name);
        }
        else
        {
            $photo_name = $currentProduct->product_image;
        }
        $Product_data = [];
        $Product_data['product_name'] = $request->name;
        $Product_data['product_description'] = $request->productDescription;
        $Product_data['price'] = $request->price;
        $Product_data['stock'] = $request->stock;
        $Product_data['product_image'] = $photo_name;
        $Product_data['product_sku'] = $request->skuNumber;
        // dd($Product_data);
        $currentProduct->update($Product_data);
        $category_id = $request->productCategory;
        $currentProduct->getCategories()->sync($category_id);
        return redirect()->route('showProduct')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        // $product = new Product();
        // $currentProduct = $product->findProduct($id);
        $models = new Config();
        $currentProduct = $models->getProductModel()->findProduct($id);
        // dd($currentProduct);
        $currentProduct->update([
            'archive' => 1
        ]);
        return redirect()->route('showProduct')->with('success', 'Product archived successfully');
    }

    public function archive()
    {
        // $p = new Product();
        // $products = $p->getUnactiveDataWithCategories()->paginate(3);
        $models = new Config();
        $products = $models->getProductModel()->getUnactiveDataWithCategories()->paginate(3);
        return view('product.archive', compact('products'));
    }

    public function unArchive($id)
    {
        // $product = new Product();
        // $currentProduct = $product->findProduct($id);
        $models = new Config();
        $currentProduct = $models->getProductModel()->findProduct($id);
        // dd($currentProduct);
        $currentProduct->update([
            'archive' => 0
        ]);
        return redirect()->route('showArchiveProduct')->with('success', 'Product Unarchive successfully');
    }

    public function search($request)
    {
        $search = $request->search;
        // $p = new Product();
        // $products = $p->getSearchedProducts($search)->paginate(3);
        $models = new Config();
        $products = $models->getProductModel()->getSearchedProducts($search)->paginate(3);
        return view('product.show', compact('products', 'search'));
    }
}
