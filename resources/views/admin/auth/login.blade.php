@extends('admin.layouts.app')

@section('title', 'Login')

@section('content')
    <div class="login login-with-artwork">
        <div class="login-container">
            <div class="login-header mb-3">
                <div class="logo-box">
                    <img src="path_to_logo" alt="{{ __('admin.auth.login.logo_alt') }}" class="logo">
                </div>
                <h1 class="title">{{ __('admin.auth.login.header') }}</h1>
            </div>
            <div class="login-body">
                <form action="{{ route('login') }}" method="post" name="login-form" class="login-form">
                    @csrf
                    <div class="form-group email-input">
                        <input id="email" type="email" name="email" placeholder="{{ __('admin.auth.login.email') }}"
                               value="{{ old('email') }}"
                               class="form-field @error('email') is-invalid @enderror"
                               aria-label="{{ __('admin.auth.login.aria_labels.email') }}"
                               autocomplete="email"
                               required autofocus>
                        <label for="email" class="form-label field-label">{{ __('admin.auth.login.email') }}</label>
                    </div>
                    <div class="form-group password-input">
                        <input id="password" type="password" name="password"
                               placeholder="{{ __('admin.auth.login.password') }}"
                               value="{{ old('password') }}"
                               class="form-field @error('password') is-invalid @enderror"
                               aria-label="{{ __('admin.auth.login.aria_labels.password') }}"
                               autocomplete="current-password" required>
                        <label for="password"
                               class="form-label field-label">{{ __('admin.auth.login.password') }}</label>
                    </div>
                    <div class="form-group remember-me-btn">
                        <input id="remember-me" type="checkbox" name="remember-me"
                               class="form-check-input"
                               aria-label="{{ __('admin.auth.login.aria_labels.remember_me') }}">
                        <label for="remember-me"
                               class="form-check-label">{{ __('admin.auth.login.remember_me') }}</label>
                    </div>
                    <div class="form-group submit-btn">
                        <input id="submit-btn" type="submit" class="login-btn"
                               value="{{ __('admin.auth.login.header') }}"
                               aria-label="{{ __('admin.auth.login.aria_labels.submit') }}">
                    </div>
                    <div class="form-group">
                        <p class="d-flex gap-2 justify-content-center reset-password-link">
                            {{ __('admin.auth.login.forgot_password') }}
                            <span>
                                <a href="{{ route('password.request') }}"
                                   class="link"
                                   aria-label="{{ __('admin.auth.login.aria_labels.reset_password') }}">
                                    {{ __('admin.auth.login.reset_password') }}
                                </a>
                            </span>
                        </p>
                    </div>
                </form>
            </div>
        </div>
        <div class="artwork">
            {{-- Artwork Here (SVG format please) --}}
            @include('components.admin.svgs.login-art-work')
        </div>
    </div>
@endsection
