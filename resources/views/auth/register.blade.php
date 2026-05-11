<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto barbearia - Registro</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <div class="container" id="container">

        <div class="logo-area" id="logo-area">
            <img src="{{ asset('img/logo.png') }}" class="img-logo" alt="Logo da Barbearia">
        </div>
        
        <div class="login-area" id="login-area">
            <h2 class="title">Criar Conta</h2>
            <p class="subtitle">Preencha os campos abaixo para criar sua conta</p>

            <form action="#" method="POST" class="form-login" id="form-login">
                <div class="input-group" id="email-group">
                    <label for="email">E-mail</label>
                    <input type="text" id="email" placeholder="seu-email@exemplo.com">
                </div>

                <div class="input-group">
                    <label for="password">Senha</label>
                    <input type="password" id="password" placeholder="••••••••">
                </div>

                <a href="{{ route('auth.recover') }}" id="forgot-password" class="forgot-password">Esqueceu a senha?</a>
                <a href="{{ route('index') }}" id="register" class="register">Já tem uma conta? Faça login</a>

                <button type="submit" class="botao">Criar Conta</button>
            </form>
        </div>

    </div>
</body>

<script src="register.js"></script>

</html>