<?php

use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\Pages;
use App\Livewire\Profile;
use App\Livewire\Register;
use App\Livewire\Settings;
use App\Livewire\Dashboard;

use App\Livewire\SinglePost;
use App\Livewire\PostComponent;
use App\Livewire\ResetPassword;
use App\Livewire\CategoryComponent;
use App\Livewire\CategoryShow;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('livewire.login');
// });

Route::get('/', Home::class)->name('home');
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');
Route::get('/post/{slug}', SinglePost::class)->name('post');
Route::get('/category/{slug}', CategoryShow::class)->name('category');

Route::middleware(['auth', 'role:admin', 'permission:Acces All'])->group(function () {
    Route::get('/posts', PostComponent::class)->name('posts');
    Route::get('/pages', Pages::class)->name('pages');
    Route::get('/categories', CategoryComponent::class)->name('categories');
    Route::get('/settings', Settings::class)->name('settings');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/profile', Profile::class)->name('profile');
    Route::post('/logout', [Profile::class, 'logout'])->name('logout');
    Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
});
