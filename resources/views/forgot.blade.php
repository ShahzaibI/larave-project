@extends('layouts.main')
@section('content')
    <section class="gradient-custom">
        <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        @if(session('error'))
                            @include('partials._error')
                        @endif
                        @if(session('success'))
                            @include('partials._success')
                        @endif
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Forgot password</h3>
                        <form action="{{ route('forgotPasswordEmail') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="email" name="email" class="form-control form-control-lg rounded-0" placeholder="Email" value="{{ old('email') }}"/>
                                        <label class="form-label" for="email">Email</label>
                                    </div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="pt-2">
                                <input class="btn btn-outline-primary btn-lg p-0 form-control rounded-0" type="submit" value="Forgot" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
