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
                    <h1 class="pb-3">Edit your Product</h1>
                    <form action="{{ route('updateProduct', $product_data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-5">
                            <div class="">
                                <div class="row ">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="name">Name</label>
                                            <input type="text" name="name" class="form-control" id="name" value="{{ $product_data->product_name }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label " for="skuNumber">SKU no.</label>
                                            <input type="text" name="skuNumber"  class="form-control" id="skuNumber" value="{{ $product_data->product_sku }}">
                                            @error('skuNumber')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="price">Price</label>
                                            <input type="text" name="price" class="form-control" id="price" value="{{ $product_data->price }}">
                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label " for="stock">Stock</label>
                                            <input type="text" name="stock"  class="form-control" id="stock" value="{{ $product_data->stock }}">
                                            @error('stock')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category" class="control-label">Category</label>
                                            <select id="category" name="productCategory" class="form-select">
                                                <option hidden value="{{ $product_data->getCategories->first()->id }}">{{ $product_data->getCategories->first()->category_name }}</option>

                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('productCategory')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="productImage">Product Image</label>
                                            <input type="file" name="productImage" class="form-control" id="productImage" value="{{ $product_data   ->product_image }}">
                                            @error('productImage')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="pt-2">
                                    <label class="control-label" for="productDescription">Product Description</label><br/>
                                    <div class="input-group">
                                        <textarea class="form-control" name="productDescription" aria-label="With textarea" id="summar" rows="5">{{ $product_data->product_description }}</textarea>
                                    </div>
                                    @error('productDescription')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mb-3 justify-content-end">
                            <input type="submit" class="btn btn-primary" value="Create">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
