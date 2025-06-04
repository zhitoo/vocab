<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\SpacedRepetitionContract;
use App\Services\SpacedRepetitionService;
use App\Contracts\ExerciseGenerationContract;
use App\Services\ExerciseGenerationService;
use App\Contracts\ProgressUpdateContract;
use App\Services\ProgressUpdateService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SpacedRepetitionContract::class, SpacedRepetitionService::class);
        $this->app->bind(ExerciseGenerationContract::class, ExerciseGenerationService::class);
        $this->app->bind(ProgressUpdateContract::class, ProgressUpdateService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
