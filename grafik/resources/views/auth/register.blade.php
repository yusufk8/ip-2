


        @extends('auth.auth')

@section('title', 'Kayıt Ol')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
        <h2 class="text-center mb-4">Kayıt Ol</h2>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="İsminiz girin" required>
            </div>
            <div class="form-group mb-3">
                <label for="email" class="form-label">E-posta</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="E-posta adresinizi girin" required>
            </div>

            <div class="form-group mb-3">
                <label for="birthdate" class="form-label">Doğum Tarihi</label>
                <input type="date" name="birthdate" id="birthdate" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="gender" class="form-label">Cinsiyet</label>
                <select name="gender" id="gender" class="form-select" required>
                    <option value="male">Erkek</option>
                    <option value="female">Kadın</option>
                    <option value="other">Diğer</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="password" class="form-label">Şifre</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Şifrenizi oluşturun" required>
            </div>

            <div class="form-group mb-3">
                <label for="password_confirmation" class="form-label">Şifreyi Onayla</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Şifrenizi tekrar girin" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Kayıt Ol</button>
        </form>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif




        <p class="text-center mt-3">
            Zaten bir hesabınız var mı? <a href="{{ route('login') }}">Giriş Yap</a>
        </p>
        
    </div>
</div>
@endsection

        
