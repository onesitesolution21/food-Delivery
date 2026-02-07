@extends('layouts.master-layout')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Forgot Password</h1>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}" class="text-white-50">Home</a></li>
            <li class="breadcrumb-item active text-white">Forgot Password</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Forgot Password Section Start -->
    <div class="container-fluid py-5" style="background: linear-gradient(to bottom, #f8f9fa, #ffffff);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <div class="card shadow-lg border-0 rounded-lg wow fadeInUp" data-wow-delay="0.1s">
                        <div class="card-body p-5">
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle me-2"></i>
                                    {{ session('status') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="text-center mb-4">
                                <div class="mb-3">
                                    <i class="fas fa-envelope-open-text text-primary" style="font-size: 3rem;"></i>
                                </div>
                                <h2 class="card-title fw-bold text-dark mb-2">Forgot Your Password?</h2>
                                <p class="text-muted">No problem! Just let us know your email address and we'll send you a
                                    password reset link.</p>
                            </div>

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <!-- Email Input -->
                                <div class="mb-4">
                                    <label for="email" class="form-label fw-semibold text-dark">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-light">
                                            <i class="fas fa-envelope text-primary"></i>
                                        </span>
                                        <input id="email" type="email"
                                            class="form-control border-light @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}"
                                            placeholder="Enter your registered email" required autocomplete="email"
                                            autofocus>
                                    </div>
                                    @error('email')
                                        <small class="text-danger d-block mt-2">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Send Reset Link Button -->
                                <button type="submit" class="btn btn-primary w-100 py-3 fw-bold mb-3">
                                    <i class="fas fa-paper-plane me-2"></i>Send Password Reset Link
                                </button>

                                <!-- Back to Login Link -->
                                <div class="text-center">
                                    <a href="{{ route('login') }}" class="text-decoration-none text-primary fw-semibold">
                                        <i class="fas fa-arrow-left me-2"></i>Back to Login
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Help Info -->
                    <div class="text-center mt-4">
                        <p class="text-muted small">
                            Check your spam folder if you don't receive the email within a few minutes
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Forgot Password Section End -->
@endsection