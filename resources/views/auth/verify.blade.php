@extends('layouts.master-layout')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Verify Email Address</h1>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}" class="text-white-50">Home</a></li>
            <li class="breadcrumb-item active text-white">Verify Email</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Email Verification Section Start -->
    <div class="container-fluid py-5" style="background: linear-gradient(to bottom, #f8f9fa, #ffffff);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <div class="card shadow-lg border-0 rounded-lg wow fadeInUp" data-wow-delay="0.1s">
                        <div class="card-body p-5">
                            @if (session('resent'))
                                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                    <i class="fas fa-check-circle me-2"></i>
                                    <strong>Success!</strong> A fresh verification link has been sent to your email address.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="text-center mb-4">
                                <div class="mb-3">
                                    <i class="fas fa-envelope-circle-check text-primary" style="font-size: 3rem;"></i>
                                </div>
                                <h2 class="card-title fw-bold text-dark mb-2">Verify Your Email</h2>
                                <p class="text-muted">One final step to complete your registration</p>
                            </div>

                            <div class="card bg-light border-0 mb-4 p-4">
                                <p class="mb-0 text-dark">
                                    <i class="fas fa-info-circle text-primary me-2"></i>
                                    <strong>Before proceeding,</strong> please check your email inbox for a verification
                                    link.
                                </p>
                            </div>

                            <p class="text-center text-muted mb-4">
                                Didn't receive the email?
                            </p>

                            <form method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-primary w-100 py-3 fw-bold mb-3">
                                    <i class="fas fa-redo me-2"></i>Resend Verification Link
                                </button>
                            </form>

                            <div class="text-center">
                                <a href="{{ route('logout') }}" class="text-decoration-none text-secondary fw-semibold"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Help Info -->
                    <div class="text-center mt-4">
                        <p class="text-muted small">
                            <i class="fas fa-lightbulb me-2"></i> Check your spam or junk folder if you don't see the email
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Email Verification Section End -->
@endsection