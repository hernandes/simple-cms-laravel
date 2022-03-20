<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\PasswordController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\SitemapController;
use App\Http\Controllers\Web\PostsController;

use App\Models\Menu;
use App\Models\Page;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get(trans('routes.login'), [AuthController::class, 'show'])->name('login');
Route::post(trans('routes.login'), [AuthController::class, 'login']);
Route::get(trans('routes.logout'), [AuthController::class, 'logout'])->name('logout');

Route::get(trans('routes.forgot-password'), [PasswordController::class, 'show'])->name('password');
Route::post(trans('routes.forgot-password-email'), [PasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get(trans('routes.forgot-password-reset') . '/{token}', [PasswordController::class, 'showResetForm'])->name('password.reset');
Route::post(trans('routes.forgot-password-reset'), [PasswordController::class, 'reset'])->name('password.reset.perform');

Route::get(trans('routes.contact'), [ContactController::class, 'index'])->name('contact');
Route::post(trans('routes.contact'), [ContactController::class, 'send'])->name('contact.send');

Route::get('noticias', [PostsController::class, 'index'])->name('posts');
Route::get('noticia/{slug}', [PostsController::class, 'show'])->name('posts.show');

Route::get('sitemap.xml', [SitemapController::class, 'xml']);
Route::get('sitemap', [SitemapController::class, 'index']);

Menu::routes();
Page::routes();
