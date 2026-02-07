@extends('layouts.master-layout')

@section('content')

    <!-- Single Products Start -->
    <div class="container-fluid shop py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-5 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">

                    <div class="product-categories mb-4">
                        <h4>Products Categories</h4>
                        <ul class="list-unstyled">
                            @foreach ($categories as $category)
                                <li>
                                    <div class="categories-item">
                                        <a href="#" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>
                                            {{ $category->name }}</a>
                                        <span>({{ $category->products()->count() }})</span>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-lg-7 col-xl-9 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row g-4 single-product">
                        <div class="col-xl-6">
                            <div class="single-carousel owl-carousel">
                                @if($product->image)
                                    @foreach ($product->image as $image)
                                        <div class="single-item"
                                            data-dot="<img class='img-fluid' src='{{ asset('storage/' . $image) }}' alt=''>">
                                            <div class="single-inner bg-light rounded">
                                                <img src="{{ asset('storage/' . $image) }}" class="img-fluid rounded" alt="Image">
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No images available.</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <h4 class="fw-bold mb-3">{{ $product->name }}</h4>
                            <p class="mb-3">Category: {{ $product->category->name }}</p>
                            <h5 class="fw-bold mb-3">{{ number_format($product->price, 2) }} $</h5>
                            <div class="d-flex mb-4">
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="mb-3">
                                <div class="btn btn-primary d-inline-block rounded text-white py-1 px-4 me-2"><i
                                        class="fab fa-facebook-f me-1"></i> Share</div>
                                <div class="btn btn-secondary d-inline-block rounded text-white py-1 px-4 ms-2"><i
                                        class="fab fa-twitter ms-1"></i> Share</div>
                            </div>
                            <div class="d-flex flex-column mb-3">
                                <small>Product SKU: {{ $product->sku }}</small>
                                <small>Available: <strong class="text-primary">{{ $product->quantity }} items in
                                        stock</strong></small>
                            </div>
                            <p class="mb-4">{{ $product->description }}</p>
                            <p class="mb-4">{{ $product->description_notes }}</p>
                            <div class="input-group quantity mb-5" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <a href="#"
                                class="btn btn-primary border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                                    class="fa fa-shopping-bag me-2 text-white"></i> Add to cart</a>
                        </div>
                        <div class="col-lg-12">
                            <nav>
                                <div class="nav nav-tabs mb-3">
                                    <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                        id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                        aria-controls="nav-about" aria-selected="true">Description</button>
                                </div>
                            </nav>
                            <div class="tab-content mb-5">
                                <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                    {{ $product->description }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Products End -->

@endsection