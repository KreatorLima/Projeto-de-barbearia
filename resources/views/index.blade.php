<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto barbearia - Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container" id="container">

        <div class="logo-area" id="logo-area">
            <img src="{{ asset('img/logo.png') }}" alt="Logo da Barbearia">
        </div>
        
        <div class="login-area" id="login-area">
            <h2 class="title">Bem-vindo</h2>
            <p class="subtitle">Faça login para acessar sua conta</p>

            <form class="form-login" id="form-login">
                <div class="input-group" id="email-group">
                    <label for="email">E-mail</label>
                    <input type="text" id="email" placeholder="seu-email@exemplo.com">
                </div>

                <div class="input-group">
                    <label for="password">Senha</label>
                    <input type="password" id="password" placeholder="••••••••">
                </div>

                <a href="{{ route('auth.recover') }}" id="forgot-password" class="forgot-password">Esqueceu a senha?</a>
                <a href="{{ route('auth.register') }}" id="register" class="register">Registrar conta</a>

                <button type="submit" class="botao">Entrar</button>
            </form>
        </div>

    </div>
</body>

<script src="script.js"></script>

</html>