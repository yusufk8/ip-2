@extends('layout')
@section('main')
<section class="section">
    <style>
        .alert-success {
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 8px;
            background: rgba(72, 187, 120, 0.1);
            border: 1px solid #48bb78;
            color: #48bb78;
        }

        .contact-form {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            background: rgba(27, 122, 54, 0.05);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .form-group {
            margin-bottom: 25px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #fff;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid rgba(157, 78, 221, 0.3);
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.05);
            color: rgb(12, 8, 8);
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #9d4edd;
            box-shadow: 0 0 0 2px rgba(157, 78, 221, 0.2);
        }

        .form-control.is-invalid {
            border-color: #ff4444;
        }

        .invalid-feedback {
            color: #ff4444;
            font-size: 14px;
            margin-top: 5px;
        }

        select.form-control {
            appearance: none;
            padding-right: 30px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%239d4edd' viewBox='0 0 16 16'%3E%3Cpath d='M8 11L3 6h10l-5 5z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
        }

        .btn-submit {
            background: linear-gradient(45deg, #9d4edd, #c77dff);
            color: white;
            padding: 14px 30px;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(157, 78, 221, 0.3);
        }

        .contact-title {
            color: #fff;
            margin-bottom: 40px;
            font-size: 2.5em;
            font-weight: 600;
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 8px;
            background: rgba(255, 59, 59, 0.1);
            border: 1px solid #ff3b3b;
            color: #ff3b3b;
        }

        .alert-success {
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 8px;
            background: rgb(59, 255, 69);

            color: rgb(254, 254, 255);

        }

        .alert ul {
            margin: 0;
            padding-left: 1rem;
        }
    </style>

    <h2 class="contact-title">Bizimle İletişime Geçin</h2>

    <div class="contact-form">
        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Ad Soyad*</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">E-posta*</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Telefon Numarası*</label>
                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                    value="{{ old('phone') }}" required maxlength="11">
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="subject">Konu*</label>
                <select class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject"
                    required>



                    <option value="">Seçiniz</option>
                    @forelse($services as $service)
                        <option value="{{ $service->id }}" {{ old('subject') == $service->id ? 'selected' : '' }}>
                            {{ $service->service }}
                        </option>
                    @empty
                        <option value="">Hizmet bulunamadı</option>
                    @endforelse
                </select>
                @error('subject')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="message">Mesajınız*</label>
                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message"
                    rows="5" required>{{ old('message') }}</textarea>
                @error('message')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-submit">Gönder</button>
        </form>
    </div>
</section>
@endsection