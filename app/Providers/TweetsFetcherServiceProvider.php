<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TweetsFetcher;

class TweetsFetcherServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('tweetsfetcher', function ($app) {
            return new TweetsFetcher();
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
