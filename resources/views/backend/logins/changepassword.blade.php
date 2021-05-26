@extends('layouts.login')

@section('content')

    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="{{ asset('backend/login/images/wre.jpg') }}" alt="sing up image"></figure>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Change Password</h2>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                @if (session()->has('error'))
                                    <span class="alert alert-danger">
                                        <strong>{{ session()->get('error') }}</strong>
                                    </span>
                                @endif
                                @if (session()->has('success'))
                                    <span class="alert alert-success">
                                        <strong>{{ session()->get('success') }}</strong>
                                    </span>
                                @endif
                                <div class="card-body">
                                    <form method="POST" action="{{ route('changePassword', $user->id) }}">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="">
                                                <input type="password"
                                                    class="form-control @error('current_password') is-invalid @enderror"
                                                    name="current_password" placeholder="Current Password">

                                                @error('current_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="">
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" placeholder="New Password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="">
                                                <input type="password"
                                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                                    name="password_confirmation" placeholder="Password Confirmation">
                                                @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-4 offset-md-4">
                                                <input type="submit" name="signin" id="signin" class="form-submit"
                                                    value="Change Password" />
                                                <input type="submit" class="form-submit" value="Back"
                                                    onclick="window.history.go(-1); return false;">

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
