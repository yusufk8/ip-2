@extends('layout')

@section('main')
<section class="my-orders">
    <div class="container">
        <h1 class="section-title">Siparişlerim</h1>
        
        @if($orders->isEmpty())
            <p>Henüz bir siparişiniz bulunmamaktadır.</p>
        @else
            <div class="order-list">
                @foreach($orders as $order)
                    <div class="order-item">
                        <h2>{{ $order->project_title }}</h2>
                        <p><strong>Durum:</strong> {{ $order->status }}</p>
                        <p><strong>Teslim Tarihi:</strong> {{ $order->deadline->format('d.m.Y') }}</p>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary">Detayları Gör</a>
                    </div>
                @endforeach
            </div>
            
            {{ $orders->links() }}
        @endif
    </div>
</section>

<style>
    .my-orders {
        padding: 50px 0;
        background: linear-gradient(135deg, #240046 0%, #3c096c 100%);
        min-height: calc(100vh - 200px);
    }

    .section-title {
        color: #fff;
        margin-bottom: 30px;
        font-size: 2em;
    }

    .order-list {
        display: grid;
        gap: 20px;
    }

    .order-item {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 15px;
        padding: 20px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #fff;
    }

    .order-item h2 {
        color: #9d4edd;
        margin-bottom: 10px;
    }

    .btn-primary {
        background: linear-gradient(45deg, #9d4edd, #c77dff);
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        color: white;
        text-decoration: none;
        display: inline-block;
        margin-top: 10px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(157, 78, 221, 0.3);
    }
</style>
@endsection