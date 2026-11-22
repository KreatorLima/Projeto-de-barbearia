<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ResetPassword::toMailUsing(function ($notifiable, string $token) {
            $resetUrl = url(route('password.reset', [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));

            $passwordBroker = config('auth.defaults.passwords', 'users');
            $expiration = config("auth.passwords.{$passwordBroker}.expire", 60);

            return (new MailMessage)
                ->subject('Redefina sua senha | Alameda Barbearia')
                ->view('emails.auth.password-reset', [
                    'user' => $notifiable,
                    'resetUrl' => $resetUrl,
                    'theme' => session('password_reset_theme', 'dark'),
                    'expiration' => $expiration,
                ]);
        });
    }
}
