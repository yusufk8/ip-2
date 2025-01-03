@extends('layout')
@section('main')
<section class="order-details">
    <div class="container">
        <div class="order-card">
            <h1 class="order-title">Sipariş Detayları</h1>
            
            <div class="status-badge {{ $order->status }}">
                @switch($order->status)
                    @case('pending')
                        Onay Bekliyor
                        @break
                    @case('accepted')
                        Onaylandı
                        @break
                    @case('rejected')
                        Reddedildi
                        @break
                    @case('completed')
                        Tamamlandı
                        @break
                @endswitch
            </div>

            <div class="order-info">
                <div class="info-group">
                    <h3>Proje Bilgileri</h3>
                    <p><strong>Başlık:</strong> {{ $order->project_title }}</p>
                    <p><strong>Açıklama:</strong> {{ $order->project_description }}</p>
                    <p><strong>Teslim Tarihi:</strong> {{ $order->deadline->format('d.m.Y') }}</p>
                    <p><strong>Bütçe:</strong> {{ number_format($order->budget, 2) }}₺</p>
                    @if($order->special_requirements)
                        <p><strong>Özel İstekler:</strong> {{ $order->special_requirements }}</p>
                        

                    @endif
                </div>

        
            </div>
        </div>
    </div>
</section>

<style>
    .order-details {
        background: linear-gradient(135deg, #240046 0%, #3c096c 100%);
        padding: 50px 20px;
        min-height: calc(100vh - 200px);
    }

    .order-card {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 15px;
        padding: 30px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: white;
        max-width: 800px;
        margin: 0 auto;
    }

    .order-title {
        color: #9d4edd;
        margin-bottom: 20px;
        font-size: 1.8em;
    }

    .status-badge {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .status-badge.pending { background: #ffd700; color: black; }
    .status-badge.accepted { background: #00ff00; color: black; }
    .status-badge.rejected { background: #ff4444; color: white; }
    .status-badge.completed { background: #4CAF50; color: white; }

    .order-info {
        display: grid;
        gap: 30px;
    }

    .info-group {
        background: rgba(255, 255, 255, 0.03);
        padding: 20px;
        border-radius: 10px;
    }

    .info-group h3 {
        color: #9d4edd;
        margin-bottom: 15px;
        font-size: 1.2em;
    }

    .info-group p {
        margin-bottom: 10px;
    }

    .designer-info {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .designer-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
    }

    @media (max-width: 768px) {
        .order-card {
            padding: 20px;
        }
    }
</style>
@endsection