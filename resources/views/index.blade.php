<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto barbearia - Login</title>
    
    @vite(['resources/css/style.css'])
</head>
<body>
    <div class="container" id="container">

        <div class="logo-area" id="logo-area">
            <img src="{{ asset('img/logo.png') }}" alt="Logo da Barbearia">
        </div>
        
        <div class="login-area" id="login-area">
            <h2 class="title">Bem-vindo</h2>
            <p class="subtitle">Faça login para acessar sua conta</p>

            <form method="POST" action="{{ route('login') }}" class="form-login" id="form-login">
                @csrf 

                <div class="input-group" id="email-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="seu-email@exemplo.com" required autofocus>
                    @error('email')
                        <span style="color: #ff4d4d; font-size: 12px;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" required>
                    @error('password')
                        <span style="color: #ff4d4d; font-size: 12px;">{{ $message }}</span>
                    @enderror
                </div>

                <a href="{{ route('password.request') }}" id="forgot-password" class="forgot-password">Esqueceu a senha?</a>
                <a href="{{ route('register') }}" id="register" class="register">Registrar conta</a>

                <button type="submit" class="botao">Entrar</button>
            </form>
        </div>

    </div>

    @if(file_exists(public_path('js/script.js')))
        <script src="{{ asset('js/script.js') }}"></script>
    @endif
</body>
</html>