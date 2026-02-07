@extends('layouts.master-layout')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Reset Password</h1>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}" class="text-white-50">Home</a></li>
            <li class="breadcrumb-item active text-white">Reset Password</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Reset Password Section Start -->
    <div class="container-fluid py-5" style="background: linear-gradient(to bottom, #f8f9fa, #ffffff);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <div class="card shadow-lg border-0 rounded-lg wow fadeInUp" data-wow-delay="0.1s">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <div class="mb-3">
                                    <i class="fas fa-key text-primary" style="font-size: 3rem;"></i>
                                </div>
                                <h2 class="card-title fw-bold text-dark mb-2">Reset Your Password</h2>
                                <p class="text-muted">Enter your email and a new password to regain access to your account
                                </p>
                            </div>

                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <!-- Email Input -->
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-semibold text-dark">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-light">
                                            <i class="fas fa-envelope text-primary"></i>
                                        </span>
                                        <input id="email" type="email"
                                            class="form-control border-light @error('email') is-invalid @enderror"
                                            name="email" value="{{ $email ?? old('email') }}" placeholder="Enter your email"
                                            required autocomplete="email" autofocus>
                                    </div>
                                    @error('email')
                                        <small class="text-danger d-block mt-2">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- New Password Input -->
                                <div class="mb-3">
                                    <label for="password" class="form-label fw-semibold text-dark">New Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-light">
                                            <i class="fas fa-lock text-primary"></i>
                                        </span>
                                        <input id="password" type="password"
                                            class="form-control border-light @error('password') is-invalid @enderror"
                                            name="password" placeholder="Create a strong password" required
                                            autocomplete="new-password">
                                    </div>
                                    <small class="text-muted d-block mt-2">
                                        <i class="fas fa-info-circle"></i> Password must be at least 8 characters long
                                    </small>
                                    @error('password')
                                        <small class="text-danger d-block mt-2">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Confirm Password Input -->
                                <div class="mb-4">
                                    <label for="password-confirm" class="form-label fw-semibold text-dark">Confirm
                                        Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-light">
                                            <i class="fas fa-lock text-primary"></i>
                                        </span>
                                        <input id="password-confirm" type="password" class="form-control border-light"
                                            name="password_confirmation" placeholder="Confirm your new password" required
                                            autocomplete="new-password">
                                    </div>
                                </div>

                                <!-- Reset Button -->
                                <button type="submit" class="btn btn-primary w-100 py-3 fw-bold mb-3">
                                    <i class="fas fa-redo me-2"></i>Reset Password
                                </button>

                                <!-- Back to Login Link -->
                                <div class="text-center">
                                    <a href="{{ route('login') }}"
                                        class="text-decoration-none text-primary fw-semibold hover-underline">
                                        <i class="fas fa-arrow-left me-2"></i>Back to Login
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Help Info -->
                    <div class="text-center mt-4">
                        <p class="text-muted small">
                            Having issues? <a href="{{ route('password.request') }}"
                                class="text-primary fw-semibold">Request a new reset link</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Reset Password Section End -->
@endsection