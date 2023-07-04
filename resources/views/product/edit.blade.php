@extends('layouts.main')
@section('content')
    <div class="container mt-3">
        @if(session('success'))
            @include('partials._success')
        @endif
        <div class="row justify-content-between">
            @include('partials._sidebar')
            <div class="col-lg-10 col-md-9 rounded h-100">
                <h1>This is Product edit page</h1>
            </div>
        </div>
    </div>
@endsection
