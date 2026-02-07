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

<div class="col-lg-6">
    <div class="products-mini-item border">
        <div class="row g-0">
            <div class="col-5">
                <div class="products-mini-img border-end h-100">
                    <img src="{{ asset('storage/' . ($product->image[0] ?? 'default-product-image.jpg')) }}"
                        class="img-fluid w-100" alt="Image">
                    <div class="products-mini-icon rounded-circle bg-primary">
                        <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="products-mini-content p-3">
                    <a href="#" class="d-block mb-2">{{ $product->category->name }}</a>
                    <a href="#" class="d-block h4">{{ $product->name }}</a>
                    <span class="text-primary fs-5">${{ number_format($product->price, 2) }}</span>
                </div>
            </div>
        </div>
        <div class="products-mini-add border p-3">
            <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4" wire:click="addProductToCart"><i
                    class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
            <div class="d-flex">
                <a href="#" class="text-primary d-flex align-items-center justify-content-center me-3"><span
                        class="rounded-circle btn-sm-square border"><i class="fas fa-random"></i></i></a>
                <a href="#" class="text-primary d-flex align-items-center justify-content-center me-0"><span
                        class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></a>
            </div>
        </div>
    </div>
</div>