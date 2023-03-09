<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

/* Front */
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

//admin
Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin_home')->middleware('admin:admin');

Route::get('/admin/login', [AdminLoginController::class, 'login'])->name('admin_login');

//use just for show pass while hash
//Route::get('/admin/show-pass', [AdminLoginController::class, 'showpass'])->name('admin_show_pass');

Route::post('/admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');

Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');

Route::get('/admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_pass');

Route::post('/admin/forget-password-submit', [AdminLoginController::class, 'forget_password_submit'])->name('admin_forget_password_submit');

Route::get('/admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset_password');

Route::post('/admin/reset-password-submit', [AdminLoginController::class, 'reset_password_submit'])->name('admin_reset_password_submit');

Route::get('/admin/edit-profile', [AdminProfileController::class, 'index'])->name('admin_profile');

Route::post('/admin/edit-profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit');

Route::get('/admin/slide/view', [AdminSliderController::class, 'index'])->name('admin_slider_view')->middleware('admin:admin');

Route::get('/admin/slide/add', [AdminSliderController::class, 'add'])->name('admin_slider_add')->middleware('admin:admin');

Route::post('/admin/slide/store', [AdminSliderController::class, 'store'])->name('admin_slider_store')->middleware('admin:admin');

Route::get('/admin/slide/edit/{id}', [AdminSliderController::class, 'edit'])->name('admin_slider_edit')->middleware('admin:admin');

Route::post('/admin/slide/update/{id}', [AdminSliderController::class, 'update'])->name('admin_slider_update')->middleware('admin:admin');

Route::get('/admin/slide/delete/{id}', [AdminSliderController::class, 'delete'])->name('admin_slider_delete')->middleware('admin:admin');




Route::get('/admin/post/view', [AdminPostController::class, 'index'])->name('admin_post_view')->middleware('admin:admin');

Route::get('/admin/post/add', [AdminPostController::class, 'add'])->name('admin_post_add')->middleware('admin:admin');

Route::post('/admin/post/store', [AdminPostController::class, 'store'])->name('admin_post_store')->middleware('admin:admin');

Route::get('/admin/post/edit/{slug}', [AdminPostController::class, 'edit'])->name('admin_post_edit')->middleware('admin:admin');

Route::post('/admin/post/update/{slug}', [AdminPostController::class, 'update'])->name('admin_post_update')->middleware('admin:admin');

Route::get('/admin/post/delete/{slug}', [AdminPostController::class, 'delete'])->name('admin_post_delete')->middleware('admin:admin');