<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\App;
use App\Models\Position;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if (App::runningInConsole()) {
            return;
        }

        $positions = collect();

        try {
            if (Schema::hasTable('positions')) {
                $positions = Position::all();
            }
        } catch (\Throwable $exception) {
            report($exception);
        }

        view()->share('positions', $positions);
    }
}
