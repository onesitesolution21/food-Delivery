@extends('layouts.master-layout')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-header">Account</div>
                    <div class="card-body">
                        <p class="mb-1"><strong>Name:</strong> {{ auth()->user() ? strtoupper(auth()->user()->name) : '-' }}
                        </p>
                        <p class="mb-3"><strong>Email:</strong> {{ auth()->user() ? auth()->user()->email : '-' }}</p>
                        <a href="{{ route('buyer.orders.index') }}" class="btn btn-outline-primary btn-sm w-100 mb-2">View
                            All Orders</a>
                        <a href="{{ route('frontend.shop') }}" class="btn btn-secondary btn-sm w-100">Continue Shopping</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Quick Links</div>
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action">Profile settings</a>
                        <a href="#" class="list-group-item list-group-item-action">Addresses</a>
                        <a href="#" class="list-group-item list-group-item-action">Payment methods</a>
                        <a href="{{ route('logout') }}" class="list-group-item list-group-item-action"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log
                            Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row mb-4 align-items-center">
                    <div class="col-md-8">
                        <h3 class="mb-1">Welcome, {{ auth()->user() ? strtoupper(auth()->user()->name) : 'Guest' }}</h3>
                        <p class="text-muted mb-0">Manage your account, view recent purchases and track orders.</p>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <a href="{{ route('buyer.orders.index') }}" class="btn btn-primary">My Orders</a>
                    </div>
                </div>
                {{-- Quick stats --}}
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h6 class="text-muted">Total Orders</h6>
                                <h3 class="mb-0">
                                    {{ auth()->check() ? auth()->user()->orders()->count() : 0 }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h6 class="text-muted">Pending</h6>
                                <h3 class="mb-0">
                                    {{ auth()->check() ? auth()->user()->orders()->where('order_status', 'pending')->count() : 0 }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h6 class="text-muted">Total Spent</h6>
                                <h3 class="mb-0">
                                    ${{ number_format(auth()->check() ? auth()->user()->orders()->sum('total_amount') : 0, 2) }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="mb-3">Recent Orders</h4>

                @if(!empty($orders) && $orders->count())
                    <div class="list-group">
                        @foreach($orders as $order)
                            @php
                                $firstItem = $order->items->first();
                                $img = null;
                                if (isset($firstItem->product->image)) {
                                    if (is_array($firstItem->product->image)) {
                                        $img = $firstItem->product->image[0] ?? null;
                                    } else {
                                        $img = $firstItem->product->image;
                                    }
                                }
                            @endphp

                            <div class="list-group-item mb-3 shadow-sm">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <img src="{{ $img ? asset('storage/' . $img) : 'https://via.placeholder.com/80' }}"
                                            alt="product" class="rounded" width="80" height="80">
                                    </div>
                                    <div class="flex-fill">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <strong>Order #{{ $order->id }}</strong>
                                                <div class="text-muted small">{{ $order->created_at->format('M d, Y H:i') }}</div>
                                            </div>
                                            <div class="text-end">
                                                <span class="badge bg-{{ $order->orderStatusBadge() }}">
                                                    {{ ucfirst($order->orderStatus()) }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="mt-2 d-flex justify-content-between align-items-center">
                                            <div class="small text-muted">
                                                @foreach($order->items as $item)
                                                    <div>{{ $item->product->name ?? 'Product' }} x {{ $item->quantity }}</div>
                                                @endforeach
                                            </div>
                                            <div>
                                                <div class="h5 mb-1">${{ number_format($order->total_amount ?? 0, 2) }}</div>

                                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                                    data-bs-target="#{{ 'orderModal' . $order->id }}">
                                                    View details
                                                </button>

                                                <div class="modal fade" id="{{ 'orderModal' . $order->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p><strong>Order ID:</strong> {{ $order->id }}</p>
                                                                <p><strong>Total Amount:</strong>
                                                                    ${{ number_format($order->total_amount ?? 0, 2) }}</p>
                                                                <p><strong>Status:</strong> {{ ucfirst($order->orderStatus()) }}</p>
                                                                <h6>Items:</h6>
                                                                @foreach($order->items as $item)
                                                                    <div class="d-flex justify-content-between">
                                                                        <span>{{ $item->product->name ?? 'Product' }} x
                                                                            {{ $item->quantity }}</span>
                                                                        <span>${{ number_format($item->price * $item->quantity, 2) }}</span>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="card">
                        <div class="card-body">You have no recent orders.</div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection