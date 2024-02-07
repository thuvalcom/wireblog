<?php

namespace App\Providers;


use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Blade\Directives\SettingDirective;
use App\Models\Setting;

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
        Blade::directive('setting', function ($expression) {
            return "<?php echo app('" . SettingDirective::class . "')->handle($expression); ?>";
        });
    }
}
