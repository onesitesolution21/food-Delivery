@extends('layouts.master-layout')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Register</h1>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
            <li class="breadcrumb-item active text-white">Register</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Register Section Start -->
    <div class="container-fluid py-5" style="background: linear-gradient(to bottom, #f8f9fa, #ffffff);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="card shadow-lg border-0 rounded-lg wow fadeInUp" data-wow-delay="0.1s">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <h2 class="card-title fw-bold text-dark mb-2">Join Us Today</h2>
                                <p class="text-muted">Create your account to get started</p>
                            </div>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- Full Name Input -->
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-semibold text-dark">Full Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-light">
                                            <i class="fas fa-user text-primary"></i>
                                        </span>
                                        <input id="name" type="text"
                                            class="form-control border-light @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" placeholder="Enter your full name"
                                            required autocomplete="name" autofocus>
                                    </div>
                                    @error('name')
                                        <small class="text-danger d-block mt-2">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Email Input -->
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-semibold text-dark">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-light">
                                            <i class="fas fa-envelope text-primary"></i>
                                        </span>
                                        <input id="email" type="email"
                                            class="form-control border-light @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" placeholder="Enter your email" required
                                            autocomplete="email">
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
                                            name="password_confirmation" placeholder="Confirm your password" required
                                            autocomplete="new-password">
                                    </div>
                                </div>

                                <!-- Register Button -->
                                <button type="submit" class="btn btn-primary w-100 py-3 fw-bold mb-3">
                                    <i class="fas fa-user-plus me-2"></i>Create Account
                                </button>

                                <!-- Divider -->
                                <div class="text-center mb-3">
                                    <span class="text-muted">Already have an account?</span>
                                </div>

                                <!-- Sign In Link -->
                                <a href="{{ route('login') }}" class="btn btn-outline-primary w-100 py-2 fw-semibold">
                                    Sign In Here
                                </a>
                            </form>
                        </div>
                    </div>

                    <!-- Privacy Info -->
                    <div class="text-center mt-4">
                        <p class="text-muted small">
                            By registering, you agree to our <a href="#" class="text-primary fw-semibold">Terms of
                                Service</a>
                            and <a href="#" class="text-primary fw-semibold">Privacy Policy</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Section End -->
@endsection