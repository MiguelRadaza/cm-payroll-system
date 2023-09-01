@extends('layout.auth-app-v2')
@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">
            <input type="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}"
                name="email" required autofocus autocomplete="email" placeholder="Email">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required
                autocomplete="current-password" placeholder="Password">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!--begin::Row-->
        <div class="row">
            <div class="col-8">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexCheckDefault">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!--end::Row-->
    </form>

    @if (Route::has('password.request'))
        <p class="mb-1">
            <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
        </p>
    @endif
    <p class="mb-0">
        <a class='text-center' href='{{ route('register') }}'>
            Register a new membership
        </a>
    </p>
@endsection
