<?php

namespace Voice\CodeQuality;

use Illuminate\Support\ServiceProvider;
use Voice\CodeQuality\App\Console\Commands\GitHooksCommand;
use Voice\CodeQuality\App\Console\Commands\TddCommand;

class CodeQualityServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/config/asseco-voice.php' => config_path('asseco-voice.php')]);

        $this->commands([
            GitHooksCommand::class,
            TddCommand::class
        ]);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/asseco-voice.php', 'asseco-voice');
    }
}