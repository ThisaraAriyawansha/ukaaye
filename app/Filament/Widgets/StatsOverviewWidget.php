<?php

namespace App\Filament\Widgets;

use App\Models\Blog;
use App\Models\ContactMessage;
use App\Models\Order;
use App\Models\Product;
use App\Models\Service;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $now = Carbon::now();

        // Orders
        $totalOrders      = Order::count();
        $pendingOrders    = Order::where('status', 'pending')->count();
        $approvedOrders   = Order::where('status', 'approved')->count();
        $rejectedOrders   = Order::where('status', 'rejected')->count();

        // Revenue
        $totalRevenue     = Order::where('status', 'approved')->sum('total');
        $thisMonthRevenue = Order::where('status', 'approved')
            ->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->sum('total');
        $lastMonthRevenue = Order::where('status', 'approved')
            ->whereMonth('created_at', $now->copy()->subMonth()->month)
            ->whereYear('created_at', $now->copy()->subMonth()->year)
            ->sum('total');
        $revenueChange    = $lastMonthRevenue > 0
            ? round((($thisMonthRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100, 1)
            : null;

        // Orders this month
        $thisMonthOrders = Order::whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->count();
        $lastMonthOrders = Order::whereMonth('created_at', $now->copy()->subMonth()->month)
            ->whereYear('created_at', $now->copy()->subMonth()->year)
            ->count();

        // Products
        $totalProducts  = Product::count();
        $inStock        = Product::where('product_status', 'in_stock')->count();
        $outOfStock     = Product::where('product_status', 'out_of_stock')->count();
        $preOrder       = Product::where('product_status', 'pre_order')->count();
        $lowStock       = Product::where('product_status', 'in_stock')->where('qty', '<=', 5)->count();
        $activeProducts = Product::where('is_active', true)->count();

        // Blogs
        $totalBlogs     = Blog::count();
        $activeBlogs    = Blog::where('is_active', true)->count();
        $draftBlogs     = $totalBlogs - $activeBlogs;

        // Services
        $totalServices  = Service::count();
        $publicServices = Service::where('is_public', true)->count();

        // Messages
        $totalMessages  = ContactMessage::count();
        $unreadMessages = ContactMessage::where('is_read', false)->count();
        $newToday       = ContactMessage::whereDate('created_at', $now->toDateString())->count();

        return [
            // --- Orders ---
            Stat::make('Total Orders', $totalOrders)
                ->description("{$pendingOrders} pending · {$approvedOrders} approved · {$rejectedOrders} rejected")
                ->descriptionIcon('heroicon-m-clipboard-document-list')
                ->color('warning')
                ->url(route('filament.admin.resources.orders.index')),

            Stat::make('Pending Orders', $pendingOrders)
                ->description('Awaiting approval')
                ->descriptionIcon('heroicon-m-clock')
                ->color($pendingOrders > 0 ? 'warning' : 'success')
                ->url(route('filament.admin.resources.orders.index')),

            // --- Revenue ---
            Stat::make('Total Revenue', 'LKR ' . number_format($totalRevenue, 2))
                ->description('All-time from approved orders')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success')
                ->url(route('filament.admin.resources.orders.index')),

            Stat::make('This Month Revenue', 'LKR ' . number_format($thisMonthRevenue, 2))
                ->description(
                    $revenueChange !== null
                        ? ($revenueChange >= 0 ? "↑ {$revenueChange}% vs last month" : "↓ " . abs($revenueChange) . "% vs last month")
                        : "No data for last month"
                )
                ->descriptionIcon($revenueChange >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($revenueChange >= 0 ? 'success' : 'danger')
                ->url(route('filament.admin.resources.orders.index')),

            // --- Products ---
            Stat::make('Total Products', $totalProducts)
                ->description("{$activeProducts} active · {$inStock} in stock · {$outOfStock} out of stock")
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color($outOfStock > 0 ? 'danger' : 'success')
                ->url(route('filament.admin.resources.products.index')),

            Stat::make('Low Stock Products', $lowStock)
                ->description('In stock with qty ≤ 5 · ' . $preOrder . ' on pre-order')
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->color($lowStock > 0 ? 'warning' : 'success')
                ->url(route('filament.admin.resources.products.index')),

            // --- Blogs ---
            Stat::make('Blog Posts', $totalBlogs)
                ->description("{$activeBlogs} published · {$draftBlogs} draft")
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('info')
                ->url(route('filament.admin.resources.blogs.index')),

            // --- Services ---
            Stat::make('Services', $totalServices)
                ->description("{$publicServices} public · " . ($totalServices - $publicServices) . ' private')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('info')
                ->url(route('filament.admin.resources.services.index')),

            // --- Messages ---
            Stat::make('Unread Messages', $unreadMessages)
                ->description("{$newToday} received today · {$totalMessages} total")
                ->descriptionIcon('heroicon-m-envelope')
                ->color($unreadMessages > 0 ? 'danger' : 'gray')
                ->url(route('filament.admin.resources.contact-messages.index')),
        ];
    }
}
