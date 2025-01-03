@extends('layout')
@section('main')


    <section class="services">
        <div class="container">
            <div class="hero">
                <h1 class="section-title">Hizmetlerimiz</h1>
                <p class="section-description">
                    Grafik tasarım alanında profesyonel ve yaratıcı çözümler sunuyoruz. Her türlü projeye özel
                    yaratıcı tasarımlar yaparak markanızı öne çıkarıyoruz.
                </p>
            </div>

            <div class="service-list" >
                @foreach ($services as $service)
                <a href="{{route('services.show', $service->id)}}" class="service-item-link">
                <div class="service-item">
                    <div class="service-icon">
                        <i class="fas fa-pencil-ruler"></i>
                    </div>
                    <h3>{{$service->service}}</h3>
                    <p>{{$service->explanation}}</p>
                </div>
                </a>
                @endforeach
                
            </div>
        </div>
    </section>



    <style>
        .services {
            background: linear-gradient(135deg, #240046 0%, #3c096c 100%);
            padding: 50px 20px;
            color: #fff;
        }
        .service-item-link {
    text-decoration: none;
    color: inherit;
    display: block;
    width: 100%;
}

.service-item-link:hover .service-item {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(157, 78, 221, 0.2);
}
        .header-section {
            margin-bottom: 200px;
            text-align: center;
        }

        .hero {
            background: rgba(255, 255, 255, 0.05);
            padding: 40px 30px;
            
            backdrop-filter: blur(10px);
            margin-bottom: 200px;
        }

        .section-title {
            font-size: 2.5em;
            font-weight: 700;
            text-align: center;
            margin-bottom: 20px;
            color: #9d4edd;
        }

        .section-description {
            font-size: 1.2em;
            text-align: center;
            color: #fff;
            margin-bottom: 40px;
        }

        .service-list {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            justify-items: center;
        }

        .service-item {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }

        .service-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(157, 78, 221, 0.2);
        }

        .service-icon {
            font-size: 3em;
            margin-bottom: 15px;
            color: #9d4edd;
        }

        .service-item h3 {
            font-size: 1.5em;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .service-item p {
            font-size: 1em;
            color: #ddd;
        }

        @media (max-width: 1024px) {
            .service-list {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .service-list {
                grid-template-columns: 1fr;
            }

            .section-title {
                font-size: 2.5em;
            }

            .section-description {
                font-size: 1.1em;
            }
        }
    </style>



@endsection
