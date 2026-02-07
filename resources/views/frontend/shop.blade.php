@extends('layouts.master-layout')

@section('content')
    <!-- Shop Page Start -->
    <div class="container-fluid shop py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-categories mb-4">
                        <h4>Products Categories</h4>
                        <ul class="list-unstyled">
                            @if ($categories)
                                @foreach ($categories as $category)
                                    <li>
                                        <div class="categories-item">
                                            <a href="#" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>
                                                {{ $category->name }}</a>
                                            <span>({{ $category->products()->count() }})</span>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <li>
                                    <div class="categories-item">
                                        <a href="#" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>
                                            No categories found</a>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="price mb-4">
                        <h4 class="mb-2">Price</h4>
                        <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput" min="0" max="500"
                            value="0" oninput="amount.value=rangeInput.value">
                        <output id="amount" name="amount" min-velue="0" max-value="500" for="rangeInput">0</output>
                        <div class=""></div>
                    </div>

                </div>
                <div class="col-lg-9 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded mb-4 position-relative">
                        <img src="{{ asset('frontend/img/product-banner-3.jpg') }}" class="img-fluid rounded w-100"
                            style="height: 250px;" alt="Image">
                        <div class="position-absolute rounded d-flex flex-column align-items-center justify-content-center text-center"
                            style="width: 100%; height: 250px; top: 0; left: 0; background: rgba(242, 139, 0, 0.3);">
                            <h4 class="display-5 text-primary">SALE</h4>
                            <h3 class="display-4 text-white mb-4">Get UP To 50% Off</h3>
                            <a href="{{ route('frontend.shop') }}" class="btn btn-primary rounded-pill">Shop Now</a>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-xl-7">
                            <div class="input-group w-100 mx-auto d-flex">
                                <input type="search" class="form-control p-3" placeholder="keywords"
                                    aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <div class="col-xl-3 text-end">
                            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between">
                                <label for="electronics">Sort By:</label>
                                <select id="electronics" name="electronicslist"
                                    class="border-0 form-select-sm bg-light me-3" form="electronicsform">
                                    <option value="volvo">Default Sorting</option>
                                    <option value="volv">Nothing</option>
                                    <option value="sab">Popularity</option>
                                    <option value="saab">Newness</option>
                                    <option value="opel">Average Rating</option>
                                    <option value="audio">Low to high</option>
                                    <option value="audi">High to low</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xl-2">
                            <ul class="nav nav-pills d-inline-flex text-center py-2 px-2 rounded bg-light mb-4">
                                <li class="nav-item me-4">
                                    <a class="bg-light" data-bs-toggle="pill" href="#tab-5">
                                        <i class="fas fa-th fa-3x text-primary"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="bg-light" data-bs-toggle="pill" href="#tab-6">
                                        <i class="fas fa-bars fa-3x text-primary"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="tab-5" class="tab-pane fade show p-0 active">
                            <div class="row g-4 product">
                                @if ($products->count() > 0)
                                    @foreach ($products as $product)
                                        <livewire:frontend.productcard :product="$product" />
                                    @endforeach

                                    {{ $products->links() }}
                                @else
                                    <div class="col-12">
                                        <p class="text-center">No products found.</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div id="tab-6" class="products tab-pane fade show p-0">
                            <div class="row g-4 products-mini">
                                @if ($products->count() > 0)
                                    @foreach ($products as $product)
                                        <livewire:frontend.productcardmini :product="$product" />
                                    @endforeach

                                    {{ $products->links() }}
                                @else
                                    <div class="col-12">
                                        <p class="text-center">No products found.</p>
                                    </div>
                                @endif

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Page End -->
@endsection