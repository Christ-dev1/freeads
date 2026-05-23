<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Auth\Notifications\VerifyEmail::toMailUsing(function ($notifiable) {
        $monLienValide = "http://127.0.0.1" . $notifiable->id . "/test";

        return (new \Illuminate\Notifications\Messages\MailMessage)
            ->subject('VÉRIFICATION FORCÉE')
            ->line('Voici votre lien de validation :')
            ->action('VÉRIFIER MON PROFIL', $monLienValide);
         });
        Paginator::useTailwind(); 
    }
}
