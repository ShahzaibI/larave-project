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
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                            <form method="POST" action="{{ route('storeUser') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="firstName" id="firstName" class="form-control form-control-lg rounded-0" placeholder="First Name" value="{{ old('firstName') }}"/>
                                            <label class="form-label" for="firstName">First Name</label>
                                        </div>
                                        @error('firstName')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                        <input type="text" name="lastName" id="lastName" class="form-control form-control-lg rounded-0" placeholder="Last Name" value="{{ old('lastName') }}"/>
                                        <label class="form-label" for="lastName">Last Name</label>
                                        </div>
                                        @error('lastName')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div class="form-outline w-100">
                                            <input type="text" name="user_name" class="form-control form-control-lg rounded-0" id="username" placeholder="User Name" value="{{ old('user_name') }}"/>
                                            <label for="username" class="form-label">User Name</label>
                                            @error('user_name')
                                                <br>
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h6 class="mb-2 pb-1">Gender: </h6>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="maleGender"
                                            value="male"/>
                                            <label class="form-check-label" for="maleGender">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                                                value="female"/>
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                        </div>
                                        @error('gender')
                                            <br>
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="form-outline">
                                            <input type="email" name="email" id="emailAddress" class="form-control form-control-lg rounded-0"  placeholder="Email" value="{{ old('email') }}"/>
                                            <label class="form-label" for="emailAddress">Email</label>
                                        </div>
                                        {{-- @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror --}}
                                        @if($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="form-outline">
                                            <input type="password" name="password" id="password" class="form-control form-control-lg rounded-0" placeholder="Password"/>
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-4 pb-2">
                                        <div class="form-outline">
                                            <input type="text" name="phone" id="phone" class="form-control form-control-lg rounded-0" placeholder="Phone" value="{{ old('phone') }}"/>
                                            <label class="form-label" for="phone">Phone</label>
                                        </div>
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <input class="btn btn-outline-primary btn-lg p-0 form-control rounded-0" type="submit" value="Sign Up"/>
                                </div>
                                <div class="pt-2">
                                    Already an have account? <a href="{{ route('loginUser') }}">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
