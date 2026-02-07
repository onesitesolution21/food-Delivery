<?php

use Livewire\Component;

new class extends Component {
    protected $listeners = ['frontend.shoppingcartcount:refresh' => 'refresh'];

};
?>

<div class="d-inline-flex align-items-center">
    <a href="{{ route('frontend.cart') }}" class="text-white d-flex align-items-center justify-content-center">
        <span class="rounded-circle btn-md-square border"><i
                class="fas fa-shopping-cart"></i>&nbsp;{{ Cart::count() > 0 ? Cart::count() : ''}}</span>

        <span class="text-white ms-2">${{Cart::subtotal();}}</span></a>
</div>