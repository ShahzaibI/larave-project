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
                    <h1 class="pb-3">Add New Product</h1>
                    <form action="{{ route('storeProduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-5">
                            <div class="">
                                <div class="row ">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="name">Name</label>
                                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label " for="skuNumber">SKU no.</label>
                                            <input type="text" name="skuNumber"  class="form-control" id="skuNumber" value="{{ old('skuNumber') }}">
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
                                            <input type="text" name="price" class="form-control" id="price" value="{{ old('price') }}">
                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label " for="stock">Stock</label>
                                            <input type="text" name="stock"  class="form-control" id="stock" value="{{ old('stock') }}">
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
                                                <option hidden value="{{ old('productCategory') }}">{{ old('productCategory') }}</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
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
                                            <input type="file" name="productImage" class="form-control" id="productImage" value="{{ old('productImage') }}">
                                            @error('productImage')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="pt-2">
                                    <label class="control-label" for="productDescription">Product Description</label><br/>
                                    <div class="input-group">
                                        <textarea class="form-control" name="productDescription" aria-label="With textarea" id="summar" rows="5"></textarea>
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
