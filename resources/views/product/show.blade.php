@extends('layouts.main')
@section('content')
    <div class="container mt-3">
        @if(session('success'))
            @include('partials._success')
        @endif
        <div class="row justify-content-between">
            @include('partials._sidebar')
            <div class="col-lg-10 col-md-9 rounded h-100">
                <div class="container-fluid p-2">
                    <h2>All Products</h2>
                    <div class="py-3">
                        <a href="{{ route('createProduct') }}" class="btn btn-primary">Add new Product</a>
                    </div>
                    <form action="{{ route('searchProduct') }}" method="GET" class="pb-3">
                        <label class="form-label" for="form1">Search</label>
                        <div class="input-group ">
                            <div class="form-outline">
                              <input type="search" id="form1" name="search" class="form-control" placeholder="Enter Name or SKU" value="{{ (isset($search))? $search : '' }}" />
                            </div>
                            @if(@isset($search))
                                <a href="{{ route('showProduct') }}" class="btn btn-warning">
                                    <i class="fas fa-refresh text-light"></i>
                                </a>
                            @endif
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                    {{-- <div class="row fw-bold">
                        <div class="col">Name</div>
                        <div class="col">Price</div>
                        <div class="col">Stock</div>
                        <div class="col">Category</div>
                        <div class="col">Description</div>
                        <div class="col">Image</div>
                        <div class="col">Action</div>
                    </div> --}}
                    <table class="table border">
                        <thead>
                          <tr>
                            <th scope="col">SKU No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Category</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td scope="row">{{ $product['product_sku'] }}</td>
                                    <td>{{ $product['product_name'] }}</td>
                                    <td>{{ $product['price'] }}</td>
                                    <td>{{ $product['stock'] }}</td>
                                    <td>
                                        @foreach($product->getCategories as $category)
                                            {{ $category['category_name'] }}
                                        @endforeach
                                    </td>
                                    <td align="justify">{{ $product['product_description'] }}</td>
                                    <td>
                                        <img src="/storage/images/{{ $product['product_image'] }}" height="100" width="100" alt="{{ $product['product_image'] }}">
                                        {{-- {{ $product['product_image'] }} --}}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="dropdown-toggle btn btn-outline-info btn-sm" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Action</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{ route('editProduct',$product['id']) }}">Edit</a></li>
                                                <li><a class="dropdown-item" href="{{ route('deleteProduct', $product['id']) }}">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if(count($products) == 0)
                        <div class="text-danger text-center pt-5">
                            No Products were found
                        </div>
                    @endif
                    <div class="py-3 text-center">
                        {{ $products->links('partials._pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
