@extends('layouts.login')

@section('title', 'Register')

@section('content')

        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST"
                            action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="userName"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="userName" id="userName" placeholder="Nhập Email hoặc sdt" required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password_confirmation" id="re_pass" placeholder="Repeat your password" required/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                    statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                                <input type="submit" class="form-submit" value="Back" onclick="window.history.go(-1); return false;">
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{ asset('backend/login/images/signup-image.jpg') }}" alt="sing up image">
                        </figure>
                        <a href="{{ route('login') }}" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>


@endsection
