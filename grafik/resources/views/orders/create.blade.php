@extends('layout')
@section('main')

<section class="orders-section">
    <div class="container">
        <div class="order-grid">
           
        
            <div class="designer-card">
    <div class="designer-header">
        <div class="designer-avatar">
            <div class="default-avatar"><img src="{{ $designer->imgurl  }}" alt=""></div>
        </div>
        <div class="designer-info">
            <h3>{{ $designer->İsim }}</h3>
            <p>{{ $designer->Deneyim }} Yıl Deneyim</p>
            @foreach($designer->allDesigners() as $designerType => $designers)
            @foreach ($designers as $designeritem )
                <div class="price-range">
                    <span>Fiyat Aralığı:</span>
                    <strong>{{ $designeritem->price_range }}₺</strong>
                </div>  
            @endforeach
            @endforeach
            
            <div class="contact">
                <span>İletişim:</span>
                <strong>{{ $designer->İletisim }}</strong>
            </div>
        </div>
    </div>
</div>
            
            <div class="order-form-card">
                <h2>Sipariş Detayları</h2>
                
                <form action="{{ route('order.store') }}" method="POST" class="order-form">
                    @csrf
                    <input type="hidden" name="designer_id" value="{{ $designer->id }}">

                    <div class="form-group">
                        <label>Proje Başlığı*</label>
                        <input type="text" 
                               name="project_title" 
                               required 
                               class="form-control @error('project_title') is-invalid @enderror"
                               value="{{ old('project_title') }}"

                               placeholder="Örn: Şirket Logo Tasarımı, E-Ticaret Web Sitesi Tasarımı">
                        @error('project_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Proje Açıklaması*</label>
                        <textarea name="project_description" 
                                  required 
                                  class="form-control @error('project_description') is-invalid @enderror"
                                  rows="4"
                                  placeholder="Yaptırmak istediğiniz proje hakkında detaylı bilgi verin">{{ old('project_description') }}</textarea>
                        @error('project_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Teslim Tarihi*</label>
                            <input type="date" 
                                   name="deadline" 
                                   required 
                                   class="form-control @error('deadline') is-invalid @enderror"
                                   value="{{ old('deadline') }}"
                                   min="{{ date('Y-m-d') }}">
                            @error('deadline')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label>Bütçe (₺)*</label>
                            <input type="number" 
                                   name="budget" 
                                   required 
                                   class="form-control @error('budget') is-invalid @enderror"
                                   value="{{ old('budget') }}"
                                   min="0"
                                   placeholder="Bütçenizi girin">
                            @error('budget')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Özel İstekler</label>
                        <textarea name="special_requirements" 
                                  class="form-control"
                                  rows="3"
                                  placeholder="Varsa özel isteklerinizi belirtin">{{ old('special_requirements') }}</textarea>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="submit-btn">
                            <i class="fas fa-check"></i>
                            Siparişi Oluştur
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
    .orders-section {
        padding: 50px 20px;
        background: linear-gradient(135deg, #240046 0%, #3c096c 100%);
        min-height: calc(100vh - 200px);
    }

    .order-grid {
        display: grid;
        grid-template-columns: 300px 1fr;
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .designer-card {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 15px;
        padding: 20px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .designer-header {
        display: flex;
        gap: 15px;
        align-items: flex-start;
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
        color: white;
        font-weight: bold;
    }
    .designer-avatar img{
        border-radius: 50%;
        width: 60px;
        height: 60px;
    }

    .designer-info h3 {
        color: #fff;
        margin-bottom: 5px;
        font-size: 1.2em;
    }

    .designer-info p {
        color: #ccc;
        font-size: 0.9em;
    }

    .price-range {
        margin-top: 15px;
        padding: 10px;
        background: rgba(157, 78, 221, 0.1);
        border-radius: 8px;
    }

    .price-range span {
        color: #9d4edd;
        font-size: 0.9em;
    }

    .price-range strong {
        display: block;
        color: #fff;
        font-size: 1.2em;
        margin-top: 5px;
    }

    .order-form-card {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 15px;
        padding: 30px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .order-form-card h2 {
        color: #9d4edd;
        margin-bottom: 30px;
        font-size: 1.8em;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    label {
        display: block;
        color: #fff;
        margin-bottom: 8px;
        font-size: 0.9em;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: #fff;
        font-size: 1em;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #9d4edd;
        outline: none;
        box-shadow: 0 0 0 2px rgba(157, 78, 221, 0.2);
    }

    .submit-btn {
        width: 100%;
        padding: 15px;
        background: linear-gradient(45deg, #9d4edd, #c77dff);
        border: none;
        border-radius: 8px;
        color: white;
        font-size: 1.1em;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(157, 78, 221, 0.3);
    }

    .invalid-feedback {
        color: #ff4444;
        font-size: 0.85em;
        margin-top: 5px;
    }

    @media (max-width: 768px) {
        .order-grid {
            grid-template-columns: 1fr;
        }

        .form-row {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
    
    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date().toISOString().split('T')[0];
        document.querySelector('input[type="date"]').min = today;
    });
</script>

@endsection