@extends('layout.auth-app')
@section('auth-class')login-page @endsection
@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href='{{ route("home") }}'><b>CM</b>Payroll System</a>  
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{ __('Reset your password') }}</p>
            @if (session('status'))
                <x-alert-widget type="success">
                    <strong>Success!!</strong> {{ Session::get('status') }}
                </x-alert-widget>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" placeholder="Enter Email Address" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <div class="input-group-text">
                        <span class="bi bi-envelope"></span>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!--begin::Row-->
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!--end::Row-->
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection