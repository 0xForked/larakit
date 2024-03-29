@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-md-10 offset-md-1 form-auth mt-3">
            <div class="row">
                <div class="col-md-6 d-none d-sm-block">
                    <img class="icon-header" height="230" src="images/illustration_login.png" alt="">
                    <ul>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                    </ul>
                </div>
                <div class="col-md-5">
                    <p class="title-form">
                        {{ __('Login') }}
                    </p>
                    <p class="subtitle-form">
                        Lorem ipsum dolor sit amet
                    </p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group content-auth">
                            <input
                                id="email"
                                type="email"
                                class="form-control input-type-primary @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                                placeholder="Email address"
                                autofocus
                            >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input
                                name="password"
                                type="password"
                                class="form-control input-type-primary @error('password') is-invalid @enderror"
                                id="exampleInputPassword1"
                                placeholder="Password"
                                required
                                autocomplete="current-password"
                            >

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="title-input-type-primary" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <button type="submit" name="signin" class="btn btn-primary btn-block btn-primary-larakit mt-2">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <div class="forgot-pass-wrap">
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        @endif

                        @if (Route::has('register'))
                            <div class="register-wrap">
                                <p>{{ __('Don\'t have an account?') }}
                                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                </p>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
