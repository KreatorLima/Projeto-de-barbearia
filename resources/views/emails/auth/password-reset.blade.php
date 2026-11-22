@php
    $isDark = ($theme ?? 'dark') === 'dark';
    $pageBackground = $isDark ? '#121212' : '#f3f0eb';
    $cardBackground = $isDark ? '#1c1c1c' : '#ffffff';
    $headingColor = $isDark ? '#f1ede7' : '#1c1815';
    $bodyColor = $isDark ? '#c5beb4' : '#514b44';
    $mutedColor = $isDark ? '#a39c92' : '#6e675d';
    $borderColor = $isDark ? '#34312e' : '#e7e2d9';
    $accentColor = $isDark ? '#c1904f' : '#a06e2e';
    $buttonTextColor = $isDark ? '#17130e' : '#ffffff';
@endphp
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="{{ $isDark ? 'dark' : 'light' }}">
    <title>Redefinição de senha | Alameda Barbearia</title>
</head>
<body style="margin:0;padding:0;background-color:{{ $pageBackground }};font-family:Arial,Helvetica,sans-serif;color:{{ $bodyColor }};">
    <div style="display:none;max-height:0;overflow:hidden;opacity:0;color:transparent;">
        Use o link seguro para criar uma nova senha da sua conta Alameda Barbearia.
    </div>
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color:{{ $pageBackground }};padding:32px 12px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width:600px;background-color:{{ $cardBackground }};border:1px solid {{ $borderColor }};border-radius:12px;overflow:hidden;">
                    <tr>
                        <td align="center" style="padding:30px 24px 24px;border-bottom:1px solid {{ $borderColor }};">
                            <div style="font-size:13px;letter-spacing:3px;font-weight:bold;color:{{ $accentColor }};text-transform:uppercase;">Alameda Barbearia</div>
                            <div style="margin-top:8px;font-size:12px;letter-spacing:1px;color:{{ $mutedColor }};text-transform:uppercase;">Cuidado nos detalhes</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:36px 32px 18px;">
                            <div style="font-size:12px;letter-spacing:2px;text-transform:uppercase;color:{{ $accentColor }};font-weight:bold;">Recuperação de acesso</div>
                            <h1 style="margin:12px 0 18px;font-size:28px;line-height:1.25;color:{{ $headingColor }};">Redefina sua senha</h1>
                            <p style="margin:0 0 14px;font-size:16px;line-height:1.6;color:{{ $bodyColor }};">Olá, {{ $user->name }}.</p>
                            <p style="margin:0 0 24px;font-size:15px;line-height:1.7;color:{{ $bodyColor }};">Recebemos uma solicitação para redefinir a senha da sua conta. Clique no botão abaixo para escolher uma nova senha.</p>
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin:0 auto 24px;">
                                <tr>
                                    <td align="center" bgcolor="{{ $accentColor }}" style="border-radius:6px;">
                                        <a href="{{ $resetUrl }}" style="display:inline-block;padding:15px 26px;border:1px solid {{ $accentColor }};border-radius:6px;background-color:{{ $accentColor }};color:{{ $buttonTextColor }};font-size:13px;font-weight:bold;letter-spacing:1px;text-decoration:none;text-transform:uppercase;">Redefinir minha senha</a>
                                    </td>
                                </tr>
                            </table>
                            <p style="margin:0 0 8px;font-size:13px;line-height:1.6;color:{{ $mutedColor }};">Por segurança, este link expira em {{ $expiration }} minutos.</p>
                            <p style="margin:0;font-size:13px;line-height:1.6;color:{{ $mutedColor }};">Se você não pediu a redefinição, pode ignorar este e-mail. Sua senha atual continuará a mesma.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:20px 32px 28px;border-top:1px solid {{ $borderColor }};">
                            <p style="margin:0 0 8px;font-size:12px;line-height:1.6;color:{{ $mutedColor }};">Se o botão não funcionar, copie este endereço e abra no navegador:</p>
                            <a href="{{ $resetUrl }}" style="font-size:12px;line-height:1.6;color:{{ $accentColor }};word-break:break-all;">{{ $resetUrl }}</a>
                            <p style="margin:20px 0 0;font-size:12px;line-height:1.6;color:{{ $mutedColor }};">Alameda Barbearia · Este é um e-mail automático de segurança.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
