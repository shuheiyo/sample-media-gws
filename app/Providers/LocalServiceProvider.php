<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
/**
 * APP_ENV = localのみで設定したいProviderを設定する
 * ServiceProvider
 */
class LocalServiceProvider extends ServiceProvider
{
    /**
     * APP_ENV = localで設定するProviderのList
     * @var array
     */
    protected $localProviders = [
        \Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->isLocal())
        {
            $this->registerServiceProvider();
        }
    }

    /**
     * 追加で使用するServiceProviderをloadする
     * Base file providers load is /config/app.php => providers
     */
    protected function registerServiceProvider()
    {
        foreach ($this->localProviders as $provider){
            $this->app->register($provider);
        }
    }
}
