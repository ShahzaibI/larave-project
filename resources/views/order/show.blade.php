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
                <table class="table border">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Status</th>
                        <th scope="col">Invoice Number</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td scope="row">{{ $loop->index + 1 }}</td>
                                <td scope="row">{{ $order['status'] }}</td>
                                <td>{{ $order['invoice_number'] }}</td>
                                <td>{{ $order['order_date'] }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle btn btn-outline-info btn-sm" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Action</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('sendEmail') }}">Send Email</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- @if(count($orders) == 0)
                    <div class="text-danger text-center pt-5">
                        No Products were found
                    </div>
                @endif
                <div class="py-3 text-center">
                    {{ $orders->links('partials._pagination') }}
                </div> --}}
            </div>
        </div>
    </div>
@endsection
