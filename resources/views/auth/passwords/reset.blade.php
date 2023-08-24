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

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    <div class="input-group-text">
                        <span class="bi bi-envelope"></span>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <div class="input-group-text">
                        <span class="bi bi-lock-fill"></span>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <div class="input-group-text">
                        <span class="bi bi-lock-fill"></span>
                    </div>
                </div>


                <!--begin::Row-->
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Reset Password') }}
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