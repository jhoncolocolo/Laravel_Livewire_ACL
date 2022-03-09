<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/', App\Http\Livewire\Auth\Home::class)->name('home.index');
    Route::get('/users', App\Http\Livewire\User::class);
    Route::get('/permissions', App\Http\Livewire\Permission::class);
    Route::get('/roles', App\Http\Livewire\Role::class);
    Route::get('/role_users', App\Http\Livewire\RoleUser::class);
    Route::get('/permission_roles', App\Http\Livewire\PermissionRole::class);
    Route::get('/permission_users', App\Http\Livewire\PermissionUser::class);
    Route::get('/languages', App\Http\Livewire\Language::class);
});


Route::get('/login', App\Http\Livewire\Auth\Login::class)->name('login');
Route::get('/register', App\Http\Livewire\Auth\Register::class)->name('register');
Route::post('/signin', [App\Http\Livewire\Auth\Login::class, 'signin'])->name('signin');
Route::post('/register', [App\Http\Livewire\Auth\Register::class, 'signup'])->name('signup');
Route::post('/logout', [App\Http\Livewire\Auth\Login::class, 'signout'])->name('signout');