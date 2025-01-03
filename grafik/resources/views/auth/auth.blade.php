    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Giriş Yap')</title>
        <style>
           
            body {
                margin: 0;
                padding: 0;
                font-family: 'Arial', sans-serif;
                background: linear-gradient(135deg, #1d0036, #3d0066);
                color: #fff;
            }

            
            .auth-container {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

           
            .auth-card {
                background: rgba(255, 255, 255, 0.1);
                padding: 20px 30px;
                border-radius: 10px;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
                width: 100%;
                max-width: 400px;
            }
            

           
            .auth-card h2 {
                text-align: center;
                margin-bottom: 20px;
                color: #fff;
            }

            
            .form-group {
                margin-bottom: 15px;
            }

            .form-group label {
                display: block;
                font-size: 14px;
                margin-bottom: 5px;
            }

            .form-control {
                width: 100%;
                padding: 10px;
                border: 1px solid #666;
                border-radius: 5px;
                background: rgba(255, 255, 255, 0.2);
                color: #fff;
            }

            .form-control::placeholder {
                color: #aaa;
            }

           
            .btn {
                display: block;
                width: 100%;
                padding: 10px;
                background-color: #6c33cf;
                border: none;
                border-radius: 5px;
                color: #fff;
                font-weight: bold;
                cursor: pointer;
            }

            .btn:hover {
                background-color: #8b46f7;
            }
            .btn-back {
    position: absolute;
    top: 20px;
    left: 20px; 
    background-color: #6c33cf;
    color: #fff;
    padding: 10px 15px;
    font-size: 16px;
    border-radius: 5px;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
}

.logo-circle {
    width: 30px;
    height: 30px;
    background-color: #fff;
    color: #6c33cf;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 10px; 
}

.logo-icon {
    font-size: 20px; 
}

.btn-back:hover {
    background-color: #8b46f7;
}

  


            
            .auth-card p {
                margin-top: 15px;
                text-align: center;
                font-size: 14px;
            }

            .auth-card p a {
                color: #8b46f7;
                text-decoration: none;
            }

            .auth-card p a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        
<a href="{{ route('anasayfa') }}" class="btn-back">
    <div class="logo-circle">
        <span class="logo-icon">&#8592;</span> 
    </div>
    Geri Dön
</a>



        <div class="auth-container">
           @yield('content')
        </div>
    </body>
    </html>
