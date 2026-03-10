<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RouteController;



// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Product Page
Route::get('/products', [ProductController::class, 'index'])->name('products');

// Product Details Page
Route::get('/productdetails', [ProductController::class, 'productdetails'])->name('productdetails');

// About Page
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Blog Page
Route::get('/blog', [BlogController::class, 'index'])->name('blog');

// Blog Details Page
Route::get('/blogdetails', [BlogController::class, 'blogdetails'])->name('blogdetails');

// Contact Us Page
Route::get('/contactus', [ContactUsController::class, 'index'])->name('contactus');
Route::post('/contact', [ContactUsController::class, 'store'])->name('contact.store');

// Faq Page
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

// Testimonials Page
Route::get('/testimonials', [TestimonialsController::class, 'index'])->name('testimonials');

// Gallery Page
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

//Cart Page
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'store'])->name('cart.add');
Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

//Wishlist Page
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::post('/wishlist/add', [WishlistController::class, 'store'])->name('wishlist.add');
Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');

//Checkout Page
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');


// Catch-all dynamic routes 
Route::get('/{slug}', [RouteController::class, 'resolve']);