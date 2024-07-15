@php
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Login - Pages')

@section('vendor-style')
<!-- Vendor -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
@endsection

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-auth.js')}}"></script>
@endsection

@section('content')
<div class="authentication-wrapper authentication-cover authentication-bg">
  <div class="authentication-inner row">
    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-7 p-0">
      <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
        <img
          src="{{ asset('assets/img/illustrations/auth-login-illustration-light.png') }}"
          alt="auth-login-cover"
          class="img-fluid my-5 auth-illustration"
          data-app-light-img="illustrations/auth-login-illustration-light.png"
          data-app-dark-img="illustrations/auth-login-illustration-dark.png" />

        <img
          src="{{ asset('assets/img/illustrations/bg-shape-image-light.png') }}"
          alt="auth-login-cover"
          class="platform-bg"
          data-app-light-img="illustrations/bg-shape-image-light.png"
          data-app-dark-img="illustrations/bg-shape-image-dark.png" />
      </div>
    </div>
    <!-- /Left Text -->

    <!-- Login -->
    <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
      <div class="w-px-400 mx-auto">
        <!-- Logo -->
        <div class="app-brand mb-4">
          <a href="{{url('/')}}" class="app-brand-link gap-2">
              @include('_partials.macros',["height"=>60,"withbg"=>'fill: #fff;'])
          </a>
        </div>
        <!-- /Logo -->
        <h3 class="mb-1 fw-bold">Welcome to Modal Berkah! 👋</h3>
        <p class="mb-4">Please sign-in to your account and start the adventure</p>
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
          {{ $message }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          {!! $message !!}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form id="formAuthentication" class="mb-3" action="{{ route('auth-login-store')}}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" autofocus>
          </div>
          <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="password">Password</label>
              <a href="{{ route('auth-forgot-password')}}">
                <small>Forgot Password?</small>
              </a>
            </div>
            <div class="input-group input-group-merge">
              <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
              <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
            </div>
          </div>
          <div class="mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="remember-me" />
              <label class="form-check-label" for="remember-me"> Remember Me </label>
            </div>
          </div>
          <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
        </form>
      </div>
    </div>
    <!-- /Login -->
  </div>
</div>
@endsection
