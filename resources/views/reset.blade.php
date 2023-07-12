@extends('layouts.main')
@section('content')
<section class="gradient-custom">
    <div class="container h-100">
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
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Reset Password</h3>
                        <form action="{{ route('updatePassword') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <div class="form-outline">
                                        <input type="password" id="oldPassword" name="oldPassword" class="form-control form-control-lg rounded-0" placeholder="Old password" value="{{ old('oldPassword') }}"/>
                                        <label class="form-label" for="oldPassword">Old password</label>
                                    </div>
                                    @error('oldPassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="form-outline">
                                        <input type="password" name="newPassword" id="newPassword" class="form-control form-control-lg rounded-0" placeholder="New password" value="{{ old('newPassword') }}"/>
                                        <label class="form-label" for="newPassword">New password</label>
                                    </div>
                                    @error('newPassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="form-outline">
                                        <input type="password" name="newPassword_confirmation" id="newPassword_confirmation" class="form-control form-control-lg rounded-0" placeholder="Confirm new password" value="{{ old('newPassword_confirmation') }}"/>
                                        <label class="form-label" for="newPassword_confirmation">Confirm new password</label>
                                    </div>
                                    @error('newPassword_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="pt-2">
                                <input class="btn btn-outline-primary btn-lg p-0 form-control rounded-0" type="submit" value="Change password" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
