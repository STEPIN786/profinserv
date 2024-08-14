<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Language Translation
Route::get('/about', [App\Http\Controllers\Frontend\AboutController::class, 'index'])->name('about');

Route::get('/', [App\Http\Controllers\Frontend\AboutController::class, 'home'])->name('home');
Route::get('/contact', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact');

Route::get('/services-details', [App\Http\Controllers\Frontend\ServicesController::class, 'index'])->name('services-details');

Route::get('/gallery', [App\Http\Controllers\Frontend\GalleryController::class, 'index'])->name('gallery');
Route::get('/testimonials', [App\Http\Controllers\Frontend\TestimonialsController::class, 'index'])->name('testimonials');
Route::get('/services', [App\Http\Controllers\Frontend\ServicesController::class, 'index'])->name('services');

// Route::get('/blogsdetails', [App\Http\Controllers\Frontend\BlogsDetailsController::class, 'index'])->name('blogsdetails');

Route::get('/blog/{id}', [App\Http\Controllers\Frontend\BlogsController::class, 'detail'])->name('blog-detail');
Route::get('/blog/catagory/{id}', [App\Http\Controllers\Frontend\BlogsController::class, 'catagory_list'])->name('blog-cat-list');

Route::get('/blogs', [App\Http\Controllers\Frontend\BlogsController::class, 'index'])->name('blogs');
Route::get('/blogsdetails', [App\Http\Controllers\Frontend\BlogsDetailsController::class, 'index'])->name('blogsdetails');

Route::post('/blog/comment/store', [App\Http\Controllers\Frontend\BlogsController::class, 'comment_store'])->name('blog-comment-store');
 


Route::get('/businesssdvisoryservices', [App\Http\Controllers\Frontend\BusinessAdvisoryServicesController::class, 'index'])->name('businesssdvisoryservices');


Route::get('/riskddvisory', [App\Http\Controllers\Frontend\RiskAdvisoryController::class, 'index'])->name('riskddvisory');



Route::get('/internalaudit', [App\Http\Controllers\Frontend\InternalAuditController::class, 'index'])->name('internalaudit');



Route::get('/accountingservices', [App\Http\Controllers\Frontend\AccountingServicesController::class, 'index'])->name('accountingservices');



Route::get('/industries', [App\Http\Controllers\Frontend\IndustriesController::class, 'index'])->name('industries');

