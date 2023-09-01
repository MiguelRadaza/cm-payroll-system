@extends('layout.auth-app-v2')
@section('content')
    <p class="register-box-msg">{{ __('Register a new membership') }}</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control  @error('key') is-invalid @enderror" name="key" required
                placeholder="Invitation key">
            <div class="input-group-text">
                <span class="fas fa-key"></span>
            </div>
            @error('company_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control  @error('name') is-invalid @enderror" name="company_name"
                value="{{ old('company_name') }}" required autocomplete="company_name" autofocus placeholder="Company Name">
            <div class="input-group-text">
                <span class="fas fa-building"></span>
            </div>
            @error('company_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
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
                autocomplete="new-password" placeholder="Password">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="Confirm Password" required
                autocomplete="new-password">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>

        <!--begin::Row-->
        <div class="row">
            <div class="col-8">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        I agree to the <a href="#">terms</a>
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">{{ __('Sign In') }}</button>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!--end::Row-->
    </form>

    <p class="mb-0">
        <a class='text-center' href='{{ route('login') }}'>
            I already have a membership
        </a>
    </p>
@endsection
