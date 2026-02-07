@extends('layouts.master-layout')

@section('content')
    <div class="container py-6">
        <h2>My Orders</h2>

        @if(!empty($orders) && count($orders))
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Items</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>#{{ $order->id }}</td>
                                <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                <td>{{ $order->order_status ?? 'N/A' }}</td>
                                <td>{{ '$' . number_format($order->amount ?? 0, 2) }}</td>
                                <td>
                                    @foreach($order->items as $item)
                                        <div>{{ $item->product->name ?? 'Product' }} x {{ $item->quantity }}</div>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>No orders found.</p>
        @endif
    </div>
@endsection