@extends('layout')
@section('main')
<section class="service-detail">
    <div class="container">
        <div class="hero">
            <h1 class="section-title">{{ $services->service }}</h1>
            <p class="section-description">{{ $services->explanation }}</p>
            
            @if(isset($designers) && count($designers) > 0)
            <div class="designers-grid">
                @foreach($designers as $designer)
                <div class="designer-card">
                    <div class="designer-profile">
                        <div class="designer-avatar">
                        <img width="50px" height="50px" src="{{$designer->designer->imgurl}}" alt="">
                        </div>
                        <h3>{{ $designer->designer->İsim ?? 'İsim Bulunamadı' }}</h3>
                    </div>
                    
                    <div class="price-range">
                        <span class="price-label">Fiyat Aralığı:</span>
                        <span class="price-value">{{ $designer->price_range }}₺</span>
                    </div>
              
                    @if(isset($designer->sample_works))
                    <div class="sample-works">
                        <h4>Örnek Çalışmalar</h4>
                        <div class="sample-images">
                            <img src="" alt="Örnek Çalışma">
                        </div>
                    </div>
                    @endif
                   
                    <a href="{{ route('order.create', $designer->designer->id) }}" class="contact-btn">İletişime Geç</a>
                    


                </div>
                @endforeach
            </div>
            @else
            <div class="no-designers">
                <p>Bu hizmet için henüz tasarımcı bulunmamaktadır.</p>
            </div>
            @endif
        </div>
    </div>
</section>






<style>
    .service-detail {
        background: linear-gradient(135deg, #240046 0%, #3c096c 100%);
        padding: 50px 20px;
        color: #fff;
    }

    .designers-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 40px;
    }

    .designer-card {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 20px;
        backdrop-filter: blur(10px);
        transition: transform 0.3s ease;
    }

    .designer-card:hover {
        transform: translateY(-5px);
    }

    .designer-profile {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }

    .designer-avatar {
        width: 60px;
        height: 60px;
        background: linear-gradient(45deg, #9d4edd, #c77dff);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;

    }
    .designer-avatar img {
        border-radius: 50%;
    }

    .price-range {
        background: rgba(157, 78, 221, 0.1);
        padding: 10px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .price-label {
        color: #9d4edd;
        font-weight: 600;
        margin-right: 10px;
    }

    .sample-works {
        margin: 20px 0;
    }

    .sample-images {
        margin-top: 10px;
        border-radius: 8px;
        overflow: hidden;
    }

    .sample-images img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .designer-description {
        color: #ddd;
        margin: 15px 0;
    }

    .contact-btn {
        width: 100%;
        background: linear-gradient(45deg, #9d4edd, #c77dff);
        border: none;
        padding: 12px;
        border-radius: 30px;
        color: white;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .contact-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(157, 78, 221, 0.3);
    }

    @media (max-width: 768px) {
        .designers-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection