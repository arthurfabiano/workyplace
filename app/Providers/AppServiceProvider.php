<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\Participant;
use App\Observers\NumberParticipantsEventObserver;
use Illuminate\Pagination\Paginator;
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
        Participant::observe(NumberParticipantsEventObserver::class);
        Paginator::useBootstrapFour();
    }
}
