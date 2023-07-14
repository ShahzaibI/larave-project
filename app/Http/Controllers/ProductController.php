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
    public function dashboard()
    {
        return $this->getProductService()->dashboard();
    }

    public function index()
    {
        return $this->getProductService()->index();
    }

    public function create()
    {
        return $this->getProductService()->create();
    }

    public function store(StoreProductRequest $request)
    {
        return $this->getProductService()->store($request);
    }

    public function edit($id)
    {
        return $this->getProductService()->edit($id);
    }

    public function update(UpdateProductRequest $request, $id)
    {
        return $this->getProductService()->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->getProductService()->destroy($id);
    }

    public function archive()
    {
        return $this->getProductService()->archive();
    }

    public function unArchive($id)
    {
        return $this->getProductService()->unArchive($id);
    }
    public function search(Request $request)
    {
        return $this->getProductService()->search($request);
    }
}
