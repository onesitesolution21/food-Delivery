@extends('layouts.master-layout')

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Cheackout Page</h1>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('frontend.shop') }}">Shop</a></li>
            <li class="breadcrumb-item active text-white">Cheackout</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Checkout Page Start -->
    <div class="container-fluid bg-light overflow-hidden py-5">
        <div class="container py-5">
            <h1 class="mb-4 wow fadeInUp" data-wow-delay="0.1s">Billing details</h1>
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('frontend.checkout.store') }}" method="POST">
                @csrf
                <div class="row g-5">
                    <div class="col-md-12 col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-item w-100">
                                    <label class="form-label my-3">First Name<sup>*</sup></label>
                                    <input type="text" name="firstname" class="form-control">
                                    <span class="text-danger">@error('firstname') {{ $message }} @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-item w-100">
                                    <label class="form-label my-3">Last Name<sup>*</sup></label>
                                    <input type="text" name="lastname" class="form-control">
                                    <span class="text-danger">@error('lastname') {{ $message }} @enderror</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Address <sup>*</sup></label>
                            <input type="text" name="address" class="form-control" placeholder="House Number Street Name">
                            <span class="text-danger">@error('address') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Town/City<sup>*</sup></label>
                            <input type="text" name="city" class="form-control">
                            <span class="text-danger">@error('city') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">State<sup>*</sup></label>
                            <input type="text" name="state" class="form-control">
                            <span class="text-danger">@error('state') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Country<sup>*</sup></label>
                            <input type="text" name="country" class="form-control">
                            <span class="text-danger">@error('country') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Postcode/Zip<sup>*</sup></label>
                            <input type="text" name="postcode" class="form-control">
                            <span class="text-danger">@error('postcode') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Mobile<sup>*</sup></label>
                            <input type="tel" name="phone" class="form-control">
                            <span class="text-danger">@error('phone') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Email Address<sup>*</sup></label>
                            <input type="email" name="email" class="form-control">
                            <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                        </div>
                        <hr>

                        <div class="form-item">
                            <textarea name="ordernotes" class="form-control" spellcheck="false" cols="30" rows="11"
                                placeholder="Oreder Notes (Optional)" name="ordernotes"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col" class="text-start">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (Cart::count())
                                        @foreach (Cart::content()->toArray() as $product)
                                            <tr class="text-center">
                                                <th scope="row" class="text-start py-4">
                                                    {{ $product['name'] }}
                                                </th>
                                                <td class="py-4">${{ $product['price'] }}</td>
                                                <td class="py-4 text-center">{{ $product['qty'] }}</td>
                                                <td class="py-4">${{ $product['subtotal'] }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center py-4">Your cart is empty.</td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-2">
                            <div class="col-12">
                                <div class="form-check text-start my-2">
                                    <input type="radio" class="form-check-input bg-primary border-0" id="Payments-1"
                                        name="payment_method" value="Payments">
                                    <label class="form-check-label" for="Payments-1">Check Payments</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-2">
                            <div class="col-12">
                                <div class="form-check text-start my-2">
                                    <input type="radio" class="form-check-input bg-primary border-0" id="Delivery-1"
                                        name="payment_method" value="Delivery" checked>
                                    <label class="form-check-label" for="Delivery-1">Cash On Delivery</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                            <button type="submit"
                                class="btn btn-primary border-secondary py-3 px-4 text-uppercase w-100 text-primary">Place
                                Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Checkout Page End -->



@endsection