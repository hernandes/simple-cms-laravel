<?php

Route::get('/', 'UsersController@dashboard')->name('dashboard');

Route::get('lang/{language}', 'LanguageController@switchLang')->name('lang.switch');

Route::get('login', 'AuthController@show')->name('login');
Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout')->name('logout');

Route::resource('users', 'UsersController')->except(['show']);
Route::post('users/upload', 'UsersController@upload')->name('users.upload');
Route::resource('pages', 'PagesController')->except(['show']);
Route::resource('pages/{page}/blocks', 'PagesBlocksController')->except(['show', 'index'])->names('page-blocks');
Route::post('pages/{page}/blocks/reorder', 'PagesBlocksController@reorder')->name('page-blocks.reorder');
Route::post('pages/{page}/blocks/upload', 'PagesBlocksController@upload')->name('page-blocks.upload');
Route::resource('pages/{page}/medias', 'PagesMediasController')->except(['show', 'index'])->names('page-medias');
Route::post('pages/{page}/medias/reorder', 'PagesMediasController@reorder')->name('page-medias.reorder');
Route::post('pages/{page}/medias/upload', 'PagesMediasController@upload')->name('page-medias.upload');
Route::resource('post-categories', 'PostCategoriesController')->except(['show']);
Route::post('post-categories/reorder', 'PostCategoriesController@reorder')->name('post-categories.reorder');
Route::resource('posts', 'PostsController')->except(['show']);
Route::post('posts/upload', 'PostsController@upload')->name('posts.upload');
Route::resource('menus', 'MenusController')->except(['show']);
Route::post('menus/reorder', 'MenusController@reorder')->name('menus.reorder');
Route::resource('settings', 'SettingsController')->except(['show']);
Route::resource('email-groups', 'EmailGroupsController')->except(['show']);
Route::resource('email-recipients', 'EmailRecipientsController')->except(['show']);
Route::get('email-forms', 'EmailFormsController@index')->name('email-forms.index');
Route::get('email-forms/{emailForm}', 'EmailFormsController@show')->name('email-forms.show');
Route::get('activities', 'ActivitiesController@index')->name('activities.index');
Route::get('activities/{activity}', 'ActivitiesController@show')->name('activities.show');
Route::resource('roles', 'RolesController')->except(['show']);
Route::resource('banners', 'BannersController')->except(['show']);
Route::post('banners/reorder', 'BannersController@reorder')->name('banners.reorder');
Route::post('banners/upload', 'BannersController@upload')->name('banners.upload');
Route::resource('partners', 'PartnersController')->except(['show']);
Route::post('partners/reorder', 'PartnersController@reorder')->name('partners.reorder');
Route::post('partners/upload', 'PartnersController@upload')->name('partners.upload');
Route::resource('testimonials', 'TestimonialsController')->except(['show']);
Route::post('testimonials/upload', 'TestimonialsController@upload')->name('testimonials.upload');
Route::resource('modals', 'ModalsController')->except(['show']);
Route::post('modals/upload', 'ModalsController@upload')->name('modals.upload');
Route::resource('faqs', 'FaqsController')->except(['show']);
Route::post('faqs/reorder', 'FaqsController@reorder')->name('faqs.reorder');


Route::resource('product-categories', 'ProductCategoriesController')->except(['show']);
Route::post('product-categories/reorder', 'ProductCategoriesController@reorder')->name('product-categories.reorder');
Route::post('product-categories/upload', 'ProductCategoriesController@upload')->name('product-categories.upload');
Route::resource('products', 'ProductsController')->except(['show']);
Route::resource('products/{product}/medias', 'ProductMediasController')->except(['show', 'index'])->names('product-medias');
Route::post('products/{product}/medias/reorder', 'ProductMediasController@reorder')->name('product-medias.reorder');
Route::post('products/{product}/medias/upload', 'ProductMediasController@upload')->name('product-medias.upload');
Route::resource('products/{product}/options', 'ProductOptionsController')->except(['show', 'index'])->names('product-options');
