@extends('auth.auth')


@section('title', 'Giriş Yap')

@section('content')
<div class="container">
    <h2>Giriş Yap</h2>

    

@if($errors->any())
    <div class="alert alert-danger">
        <div class="alert-content">
            <svg class="alert-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<style>
.alert {
    padding: 1rem;
    border-radius: 8px;
    margin: 1rem 0;
    animation: slideIn 0.3s ease-out;
}

.alert-content {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
}

.alert-icon {
    width: 24px;
    height: 24px;
    flex-shrink: 0;
}

.alert-success {
    background-color: #ecfdf5;
    border: 1px solid #059669;
    color: #065f46;
}

.alert-danger {
    background-color: #fef2f2;
    border: 1px solid #dc2626;
    color: #991b1b;
}

.alert ul {
    margin: 0;
    padding-left: 1.5rem;
}

.alert li {
    margin: 0.25rem 0;
}

@keyframes slideIn {
    from {
        transform: translateY(-10px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}


@media (max-width: 640px) {
    .alert {
        padding: 0.75rem;
        margin: 0.75rem 0;
    }
}
</style>


    @if(session('error'))

        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
       
    </div>
@endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">E-posta</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Şifre</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <button type="submit"  class="btn btn-primary">Giriş Yap</button>
    </form>

    <p class="mt-3">
        Henüz hesabınız yok mu? <a href="{{ route('register') }}">Kayıt Ol</a>
    </p>
</div>
@endsection
