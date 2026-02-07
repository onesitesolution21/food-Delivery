@extends('layouts.master-layout')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Login</h1>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
            <li class="breadcrumb-item active text-white">Login</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Login Section Start -->
    <div class="container-fluid py-5" style="background: linear-gradient(to bottom, #f8f9fa, #ffffff);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <div class="card shadow-lg border-0 rounded-lg wow fadeInUp" data-wow-delay="0.1s">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <h2 class="card-title fw-bold text-dark mb-2">Sign In</h2>
                                <p class="text-muted">Enter your credentials to access your account</p>
                            </div>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email Input -->
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-semibold text-dark">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-light">
                                            <i class="fas fa-envelope text-primary"></i>
                                        </span>
                                        <input type="email" class="form-control border-light @error('email') is-invalid @enderror" 
                                            id="email" name="email" placeholder="Enter your email" 
                                            value="{{ old('email') }}" required>
                                    </div>
                                    @error('email')
                                        <small class="text-danger d-block mt-2">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Password Input -->
                                <div class="mb-3">
                                    <label for="password" class="form-label fw-semibold text-dark">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-light">
                                            <i class="fas fa-lock text-primary"></i>
                                        </span>
                                        <input type="password" class="form-control border-light @error('password') is-invalid @enderror" 
                                            id="password" name="password" placeholder="Enter your password" 
                                            required autocomplete="current-password">
                                    </div>
                                    @error('password')
                                        <small class="text-danger d-block mt-2">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Remember & Forgot Password -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember" name="remember" 
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label text-muted" for="remember">
                                            Remember me
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-decoration-none text-primary fw-semibold">
                                            Forgot Password?
                                        </a>
                                    @endif
                                </div>

                                <!-- Login Button -->
                                <button type="submit" class="btn btn-primary w-100 py-3 fw-bold mb-3">
                                    <i class="fas fa-sign-in-alt me-2"></i>Sign In
                                </button>

                                <!-- Divider -->
                                <div class="text-center mb-3">
                                    <span class="text-muted">Don't have an account?</span>
                                </div>

                                <!-- Sign Up Link -->
                                <a href="{{ route('register') }}" class="btn btn-outline-primary w-100 py-2 fw-semibold">
                                    Create New Account
                                </a>
                            </form>
                        </div>
                    </div>

                    <!-- Support Info -->
                    <div class="text-center mt-4">
                        <p class="text-muted small">
                            Need help? <a href="#" class="text-primary fw-semibold">Contact our support team</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Section End -->
@endsection