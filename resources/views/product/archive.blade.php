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
                    <h2 class="pb-3">Archive Products</h2>
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
                                    <td class="">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle btn btn-outline-info btn-sm" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Action</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{ route('unArchiveProduct', $product['id']) }}">Unarchive</a></li>
                                                <li><a class="dropdown-item" href="#    ">delete</a></li>
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
