@extends('layouts.master-layout')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Confirm Password</h1>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}" class="text-white-50">Home</a></li>
            <li class="breadcrumb-item active text-white">Confirm Password</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Confirm Password Section Start -->
    <div class="container-fluid py-5" style="background: linear-gradient(to bottom, #f8f9fa, #ffffff);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <div class="card shadow-lg border-0 rounded-lg wow fadeInUp" data-wow-delay="0.1s">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <div class="mb-3">
                                    <i class="fas fa-shield-alt text-primary" style="font-size: 3rem;"></i>
                                </div>
                                <h2 class="card-title fw-bold text-dark mb-2">Confirm Your Password</h2>
                                <p class="text-muted">Please verify your password to continue with this sensitive action</p>
                            </div>

                            <div class="alert alert-info alert-dismissible fade show mb-4" role="alert">
                                <i class="fas fa-shield-alt me-2"></i>
                                <strong>Security Notice:</strong> This is a secure area. Please confirm your password to
                                proceed.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="{{ route('password.confirm') }}">
                                @csrf

                                <!-- Password Input -->
                                <div class="mb-4">
                                    <label for="password" class="form-label fw-semibold text-dark">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-light">
                                            <i class="fas fa-lock text-primary"></i>
                                        </span>
                                        <input id="password" type="password"
                                            class="form-control border-light @error('password') is-invalid @enderror"
                                            name="password" placeholder="Enter your password" required
                                            autocomplete="current-password">
                                    </div>
                                    @error('password')
                                        <small class="text-danger d-block mt-2">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Confirm Button -->
                                <button type="submit" class="btn btn-primary w-100 py-3 fw-bold mb-3">
                                    <i class="fas fa-check me-2"></i>Confirm Password
                                </button>

                                <!-- Forgot Password Link -->
                                @if (Route::has('password.request'))
                                    <div class="text-center">
                                        <a href="{{ route('password.request') }}"
                                            class="text-decoration-none text-primary fw-semibold">
                                            <i class="fas fa-question-circle me-2"></i>Forgot Your Password?
                                        </a>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>

                    <!-- Help Info -->
                    <div class="text-center mt-4">
                        <p class="text-muted small">
                            <i class="fas fa-info-circle me-2"></i> Your password is never shared and is securely encrypted
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Confirm Password Section End -->
@endsection