@extends('layouts.auth')

@section('login')
    <div class="login-box">

        <!-- /.login-logo -->
        <div class="login-box-body" style="border-radius: 40px;">
            <div class="login-logo"
                style="padding: 13px; background-color: aqua; width: 80px; border-radius: 50%; margin: 0 auto; text-align: center;">
                <a href="/" style="display: block;"><b>V</b></a>
            </div>


            <p class="login-box-msg" style="padding: 20px;">Sign in Untuk Masuk </p>

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group has-feedback @error('email') has-error @enderror">
                    <input type="email" name="email" class="form-control" placeholder="Email" required value="{{ old('email')}}" autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @error('email')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group has-feedback @error('password') has-error @enderror">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @error('password')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
@endsection
