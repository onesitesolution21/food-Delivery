<?php

use Livewire\Component;

new class extends Component {
    public $product = '';

    public function addProductToCart()
    {
        Cart::add(
            $this->product->id,
            $this->product->name,
            1,
            $this->product->price,
            0,
            ['image' => $this->product->image[0]]
        );

        flash()->success('Product added to cart successfully!');

        $this->dispatch('frontend.shoppingcartcount:refresh');
    }
};
?>

<div class="col-md-6 col-lg-4 col-xl-3">
    <div class="product-item rounded wow fadeInUp" data-wow-delay="0.1s">
        <div class="product-item-inner border rounded">
            <div class="product-item-inner-item">
                <img src="{{ asset('storage/' . ($product->image[0] ?? 'default-product-image.jpg')) }}"
                    class="img-fluid w-100 rounded-top" alt="">
                <div class="product-new">New</div>
                <div class="product-details">
                    <a href="{{ route('frontend.product-details', $product->slug) }}"><i
                            class="fa fa-eye fa-1x"></i></a>
                </div>
            </div>
            <div class="text-center rounded-bottom p-4">
                <a href="#" class="d-block mb-2">{{ $product->category->name }}</a>
                <a href="#" class="d-block h4">{{ $product->name }}</a>
                <span class="text-primary fs-5">${{ number_format($product->price, 2) }}</span>
            </div>
        </div>
        <div class="product-item-add border border-top-0 rounded-bottom text-center p-4 pt-0">
            <button wire:click="addProductToCart" class="btn btn-primary border-secondary rounded-pill py-2 px-4 mb-4">
                <i class="fas fa-shopping-cart me-2"></i>Add To Cart
            </button>
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex">
                    <i class="fas fa-star text-primary"></i>
                    <i class="fas fa-star text-primary"></i>
                    <i class="fas fa-star text-primary"></i>
                    <i class="fas fa-star text-primary"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="d-flex">
                    <a href="#" class="text-primary d-flex align-items-center justify-content-center me-3"><span
                            class="rounded-circle btn-sm-square border"><i class="fas fa-random"></i></i></a>
                    <a href="#" class="text-primary d-flex align-items-center justify-content-center me-0"><span
                            class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>