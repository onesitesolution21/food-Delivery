<?php

use Livewire\Component;

new class extends Component {
    public function cartQtyIncrement($id, $qty)
    {
        $qty = $qty + 1;
        Cart::update($id, $qty);
        $this->dispatch('frontend.shoppingcartcount:refresh');
    }

    public function cartQtyDecrement($id, $qty)
    {
        $qty = $qty - 1;
        Cart::update($id, $qty);
        $this->dispatch('frontend.shoppingcartcount:refresh');
    }

    public function removeCartItem($id)
    {
        Cart::remove($id);
        flash()->info('Product removed from cart successfully!');
        $this->dispatch('frontend.shoppingcartcount:refresh');
    }
};
?>

<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    @if (Cart::count())
                        @foreach (Cart::content()->toArray() as $product)

                            <tr>
                                <th scope="row">
                                    <p class="mb-0 py-4">{{ $product['name'] }}</p>
                                </th>
                                <td>
                                    <p class="mb-0 py-4">{{ $product['price'] }} $</p>
                                </td>
                                <td>
                                    <div class="input-group quantity py-4" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-minus rounded-circle bg-light border"
                                                wire:click="cartQtyDecrement('{{ $product['rowId'] }}', {{ $product['qty'] }})">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm text-center border-0"
                                            value="{{ $product['qty'] }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-plus rounded-circle bg-light border"
                                                wire:click="cartQtyIncrement('{{ $product['rowId'] }}', {{ $product['qty'] }})">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 py-4">{{ $product['subtotal'] }} $</p>
                                </td>
                                <td class="py-4">
                                    <button class="btn btn-md rounded-circle bg-light border"
                                        wire:click="removeCartItem('{{ $product['rowId'] }}')">
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                    @else
                        <tr>
                            <td colspan="6" class="text-center py-4">Your cart is empty.<a
                                    href="{{ route('frontend.shop') }}" class="btn btn-sm btn-primary ms-2">Shop Now</a>
                            </td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
        <div class="mt-5">
            <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
            <button class="btn btn-primary rounded-pill px-4 py-3" type="button">Apply Coupon</button>
        </div>
        <div class="row g-4 justify-content-end">
            <div class="col-8"></div>
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="bg-light rounded">
                    <div class="p-4">
                        <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="mb-0 me-4">Subtotal:</h5>
                            <p class="mb-0">${{ Cart::subtotal() }}</p>
                        </div>
                    </div>
                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                        <h5 class="mb-0 ps-4 me-4">Total</h5>
                        <p class="mb-0 pe-4">${{ Cart::total() }}</p>
                    </div>
                    <a href="{{ route('frontend.checkout') }}"
                        class="btn btn-primary rounded-pill px-4 py-3 text-uppercase mb-4 ms-4" type="button">Proceed
                        Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Page End -->