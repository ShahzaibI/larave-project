@extends('layouts.main')
@section('content')
    {{-- <div class="container mt-3">
        @if(session()->has('errors'))
            @foreach ($errors->all()  as $e)
                <div class="alert alert-danger" role="atert">
                    <p>{{ $e }}</p>
                </div>
            @endforeach
        @endif
    </div> --}}
    <section class="vh-100 gradient-custom ">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            @if(session('success'))
                                @include('partials._success');
                            @endif
                            @if(session('error'))
                                @include('partials._error');
                            @endif
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Change Password</h3>
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="row">
                                    <div class="mb-4 pb-2">
                                        <div class="form-outline">
                                            <input type="email" name="email" id="emailAddress" class="form-control form-control-lg rounded-0"  placeholder="Email" value="{{ old('email') }}"/>
                                            <label class="form-label" for="emailAddress">Email</label>
                                        </div>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-4 pb-2">
                                        <div class="form-outline">
                                            <input type="password" name="password" id="password" class="form-control form-control-lg rounded-0" placeholder="Password" value="{{ old('password') }}"/>
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-4 pb-2">
                                        <div class="form-outline">
                                            <input type="password" name="password_confirmation" id="newPassword" class="form-control form-control-lg rounded-0" placeholder="Repeat Password" value="{{ old('password_confirmation') }}"/>
                                            <label class="form-label" for="newPassword">Repeat Password</label>
                                        </div>
                                        @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <input class="btn btn-outline-primary btn-lg p-0 form-control rounded-0" type="submit" value="Change Password"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
