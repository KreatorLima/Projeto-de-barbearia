<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto barbearia - Recuperar Senha</title>
    <link rel="stylesheet" href="{{ asset('css/recover.css') }}">
</head>
<body>
    <div class="container" id="container">

        <div class="logo-area" id="logo-area">
            <img src="{{ asset('img/logo.png') }}" class="img-logo" alt="Logo da Barbearia">
        </div>
        
        <div class="login-area" id="login-area">
            <h2 class="title">Recuperar Senha</h2>
            <p class="subtitle">Informe seu e-mail para recuperar a senha</p>

            <form action="#" method="POST" class="form-login" id="form-login">
                <div class="input-group" id="email-group">
                    <label for="email">E-mail</label>
                    <input type="text" id="email" placeholder="seu-email@exemplo.com">
                </div>

                <div class="msg-email" id="msg-email">
                    
                </div>
                

                <a href="{{ route('auth.register') }}" id="register" class="register">Criar conta</a>
                <a href="{{ route('index') }}" id="login" class="login">Já tem uma conta? Faça login</a>

                <button type="submit" class="botao" id="botao">Recuperar Senha</button>
            </form>
        </div>

    </div>
</body>

<script src="recover.js"></script>

</html>