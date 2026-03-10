<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Blog;

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
        View::composer('frontend.components.footer', function ($view) {
            $footerRecentBlogs = Blog::where('is_active', true)
                ->latest('published_at')
                ->take(2)
                ->get();

            $view->with('footerRecentBlogs', $footerRecentBlogs);
        });
    }
}
