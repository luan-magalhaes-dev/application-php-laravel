@extends('layouts.auth.page')

@section('content-login')
    <div class="col-lg-4 col-sm-12 m-auto">
        <form class="card auth_form"
              method="POST"
              action="{{ route('dashboard.login') }}">
            @csrf
            <div class="header">
                <h5>{{ config('custom.name') }}</h5>
            </div>
            <div class="body">
                <div class="input-group mb-3">
                    <input type="email"
                           class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                           placeholder="@lang('auth.text_email')"
                           autofocus
                           value="{{ old('email') }}"
                           name="email"
                           required>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="zmdi zmdi-account-circle"></i>
                        </span>
                    </div>
                    @if ($errors->has('email'))
                        <label id="email-error"
                               class="error"
                               for="email">
                            <strong>{{ $errors->first('email') }}</strong>
                        </label>
                    @endif
                </div>
                <div class="input-group mb-3">
                    <input type="password"
                           class="form-control"
                           placeholder="@lang('auth.text_password')"
                           name="password"
                           id="password"
                           required>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="zmdi zmdi-lock"></i>
                        </span>
                    </div>
                    @if ($errors->has('password'))
                        <label id="password-error"
                               class="error"
                               for="password">
                            <strong>{{ $errors->first('password') }}</strong>
                        </label>
                    @endif
                </div>
                <div class="checkbox">
                    <input type="checkbox"
                           name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">@lang('auth.text_remember_me')</label>
                </div>
                <button type="submit"
                        class="btn btn-primary btn-block waves-effect waves-light">
                    @lang('auth.text_login')
                </button>
            </div>
        </form>
    </div>
@endsection
