<?php

namespace Asseco\CodeQuality;

use Asseco\CodeQuality\App\Console\Commands\GitHooksCommand;
use Asseco\CodeQuality\App\Console\Commands\TddCommand;
use Illuminate\Support\ServiceProvider;

class CodeQualityServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/asseco-code-quality.php', 'asseco-code-quality');
    }

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/../config/asseco-code-quality.php' => config_path('asseco-code-quality.php')]);

        $this->commands([
            GitHooksCommand::class,
            TddCommand::class,
        ]);
    }
}
