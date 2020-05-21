<?php

use App\Models\Menu;
use App\Models\Page;

Route::get('/', 'HomeController@index')->name('home');

Route::get(trans('routes.login'), 'AuthController@show')->name('login');
Route::post(trans('routes.login'), 'AuthController@login');
Route::get(trans('routes.logout'), 'AuthController@logout')->name('logout');

Route::get(trans('routes.forgot-password'), 'PasswordController@show')->name('password');
Route::post(trans('routes.forgot-password-email'), 'PasswordController@sendResetLinkEmail')->name('password.email');
Route::get(trans('routes.forgot-password-reset') . '/{token}', 'PasswordController@showResetForm')->name('password.reset');
Route::post(trans('routes.forgot-password-reset'), 'PasswordController@reset')->name('password.reset.perform');

Route::get(trans('routes.contact'), 'ContactController@index')->name('contact');
Route::post(trans('routes.contact'), 'ContactController@send')->name('contact.send');

Route::get('sitemap.xml', 'SitemapController@xml');
Route::get('sitemap', 'SitemapController@index');

Menu::routes();
Page::routes();
