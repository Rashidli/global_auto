<?php

namespace App\Providers;

use App\Models\Card;
use App\Models\Service;
use App\Models\Word;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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

        $words = Word::all()->keyBy('key');
        View::share(['words' => $words]);

        $services = Service::where('is_active', true)->orderBy('id', 'desc')->get();
        View::share(['services' => $services]);

        $cards = Card::orderBy('id', 'desc')->get();
        View::share(['cards' => $cards]);
    }
}
