@extends('layouts.main')
@section('content')
    <div class="container mt-3">
        @if(session('success'))
            @include('partials._success')
        @endif
    <div>
    <div class="row justify-content-between">
        @include('partials._sidebar')
        <div class="col-lg-10 col-md-9 rounded h-100">
            <div class="container-fluid p-2">
                <h2>All Orders</h2>
            </div>
        </div>
    </div>
@endsection
