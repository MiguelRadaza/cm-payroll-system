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
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <div class="input-group-text">
                        <span class="bi bi-lock-fill"></span>
                    </div>
                    @error('password')
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
                                {{ __('Confirm Password') }}
                            </button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
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