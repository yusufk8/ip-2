<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Modern ve profesyonel freelance grafik tasarım platformu">
    <meta name="keywords" content="grafik tasarım, freelance, yaratıcı işler, modern tasarım">
    <meta name="author" content="Grafik Tasarım Ekibi">
    <title>Modern Grafik Tasarım</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        

        body, html {
            height: 100%;
        }
        

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #13001e 0%, #240046 100%);
            color: #fff;
            overflow-x: hidden;
            scroll-behavior: smooth;
            display: flex;
            flex-direction: column;
        }
        .user-menu {
    position: relative;
}

.user-button {
    display: flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(45deg, #9d4edd, #c77dff);
    padding: 12px 24px;
    border-radius: 30px;
    cursor: pointer;
    transition: all 0.4s ease;
    box-shadow: 0 4px 15px rgba(157, 78, 221, 0.3);
}

.user-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(157, 78, 221, 0.5);
}

.user-icon {
    font-size: 1.2em;
}

.user-dropdown {
    position: absolute;
    top: 100%;
    right: 0;
    margin-top: 10px;
    background: rgba(17, 17, 17, 0.95);
    border-radius: 8px;
    padding: 10px;
    display: none;
    min-width: 150px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.user-dropdown.active {
    display: block;
}

.logout-button {
    background-color:rgb(44, 10, 158); 
      border: none;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
}

.logout-button:hover {
    background: rgba(157, 78, 221, 0.2);
    color: #9d4edd;
}

        
        header {
            background: rgba(17, 17, 17, 0.95);
            backdrop-filter: blur(10px);
            color: #fff;
            padding: 20px 0;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logo {
            position: absolute;
            left: 20px;
            font-size: 2em;
            width: 350px;
            font-weight: 700;
            color: #9d4edd;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        
        nav {
            display: flex;
            gap: 30px;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            font-size: 1.1em;
            font-weight: 500;
            transition: all 0.4s ease;
            padding: 10px 20px;
            border-radius: 8px;
            position: relative;
            overflow: hidden;
        }

        nav a::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(157, 78, 221, 0.1);
            transform: translateX(-100%);
            transition: transform 0.4s ease;
            z-index: -1;
        }

        nav a:hover {
            color: #9d4edd;
            transform: translateY(-2px);
        }

        nav a:hover::before {
            transform: translateX(0);
        }

        
        .right-nav {
            position: absolute;
            right: 20px;
            display: flex;
            gap: 15px;
        }

        .right-nav a {
            background: linear-gradient(45deg, #9d4edd, #c77dff);
            width: 120px;
            padding: 12px 24px;
            border-radius: 30px;
            text-decoration: none;
            color: white;
            font-weight: 600;
            transition: all 0.4s ease;
            text-align: center;
            box-shadow: 0 4px 15px rgba(157, 78, 221, 0.3);
        }

        .right-nav a:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(157, 78, 221, 0.5);
            background: linear-gradient(45deg, #c77dff, #9d4edd);
        }

        
        main {
            padding: 100px 20px;
            text-align: center;
            background: linear-gradient(135deg, #240046 0%, #3c096c 100%);
            position: relative;
          
            flex: 1;
        }

        .hero {
            background: rgba(255, 255, 255, 0.05);
            padding: 60px 40px;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transform: scale(1);
            transition: all 0.5s ease;
        }

        .hero:hover {
            transform: scale(1.02);
            box-shadow: 0 12px 40px rgba(157, 78, 221, 0.2);
        }

        
        footer {
            text-align: center;
            padding: 30px;
            background: rgba(17, 17, 17, 0.95);
            color: #fff;
            position: relative;
            box-shadow: 0 -4px 30px rgba(0, 0, 0, 0.3);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        footer a {
            color: #9d4edd;
            margin: 0 15px;
            text-decoration: none;
            font-size: 1.1em;
            transition: all 0.3s ease;
            padding: 8px 16px;
            border-radius: 6px;
        }

        footer a:hover {
            color: #c77dff;
            background: rgba(157, 78, 221, 0.1);
            transform: translateY(-2px);
        }

        
        .background-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://www.transparenttextures.com/patterns/diamond-pattern.png');
            opacity: 0.03;
            animation: backgroundMove 40s linear infinite;
            pointer-events: none;
        }

        @keyframes backgroundMove {
            0% { transform: translate(0, 0); }
            50% { transform: translate(5%, 5%); }
            100% { transform: translate(0, 0); }
        }

        
        @media (max-width: 768px) {
            nav {
                display: none;
                flex-direction: column;
                background: rgba(17, 17, 17, 0.98);
                position: absolute;
                top: 80px;
                left: 0;
                width: 100%;
                padding: 20px 0;
                backdrop-filter: blur(10px);
            }

            nav.active {
                display: flex;
            }

            .hamburger {
                display: flex;
                flex-direction: column;
                gap: 6px;
                cursor: pointer;
            }

            .hamburger div {
                background-color: #9d4edd;
                height: 3px;
                width: 30px;
                border-radius: 3px;
                transition: all 0.3s ease;
            }

            .right-nav {
                position: static;
                margin-top: 20px;
            }

            header {
                flex-direction: column;
                padding: 15px;
            }

            .logo {
                position: static;
                margin-bottom: 15px;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="background-animation"></div>
    <header>
        <div class="logo">Grafik Tasarım</div>
        <div class="hamburger" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <nav>
            <a href="/" title="Ana Sayfa">Ana Sayfa</a>
            <a href="/hakkimizda" title="Hakkımızda">Hakkımızda</a>
            <a href="/contact" title="İletişim">İletişim</a>
            <a href="/services" title="Hizmetlerimiz">Hizmetlerimiz</a>
        </nav>
        <div class="right-nav">
    @auth
        <div class="user-menu">
            <div class="user-button" onclick="toggleUserMenu()">
                <i class="user-icon">👤</i>
                {{ Auth::user()->email }}
            </div>
            <div class="user-dropdown" id="userDropdown">
            
    <div class="dropdown-content">
    
      
      <button onclick="window.location.href='{{ route('orders.index') }}'" class="logout-button">Siparişlerim</button>
      <button onclick="window.location.href='{{ route('messages.index') }}'" class="logout-button">Mesajlar</button>
      <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="logout-button">Çıkış Yap</button>
                </form>
    </div>

            
            </div>
        </div>
    @else
        <a href="{{ route('login') }}" class="btn btn-primary">Giriş Yap</a>
    @endauth
</div>
    </header>
    
    


    <main>
        @yield('main')
    </main>

    <footer>
        &copy; 2024 Grafik Tasarım. Tüm hakları saklıdır.
        <div>
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">Instagram</a>
        </div>
    </footer>

    <script>
        function toggleUserMenu() {
    const dropdown = document.getElementById('userDropdown');
    dropdown.classList.toggle('active');
    
    // Sayfa herhangi bir yerine tıklandığında menüyü kapatma
    document.addEventListener('click', function(event) {
        const userMenu = document.querySelector('.user-menu');
        const isClickInside = userMenu.contains(event.target);
        
        if (!isClickInside && dropdown.classList.contains('active')) {
            dropdown.classList.remove('active');
        }
    });
}
        function toggleMenu() {
            const nav = document.querySelector('nav');
            nav.classList.toggle('active');
        }
    </script>
</body>
</html>