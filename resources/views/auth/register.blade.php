@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-md-10 offset-md-1 form-auth mt-md-3">
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
                        {{ __('Register') }}
                    </p>
                    <p class="subtitle-form">
                        Lorem ipsum dolor sit amet
                    </p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group content-auth">
                            <input
                                id="name"
                                type="text"
                                class="form-control input-type-primary @error('name') is-invalid @enderror"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autocomplete="name"
                                placeholder="{{ __('Name') }}"
                                autofocus
                            >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group content-auth">
                            <input
                                id="email"
                                type="email"
                                class="form-control input-type-primary @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                                placeholder="{{ __('E-Mail Address') }}"
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
                                id="password"
                                placeholder="{{ __('Password') }}"
                                required
                                autocomplete="new-password"
                            >

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input
                                id="password-confirm"
                                type="password"
                                class="form-control input-type-primary"
                                name="password_confirmation"
                                placeholder="{{ __('Confirm Password') }}"
                                required
                                autocomplete="new-password"
                            >
                        </div>

                        <button type="submit" name="signin" class="btn btn-primary btn-block btn-primary-larakit mt-2">
                            {{ __('Register') }}
                        </button>
                        <div class="register-wrap">
                            <p>{{ __('Already have an account?') }}
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
