<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PermissionController;

/*
|--------------------------------------------------------------------------
|   Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'landingpage'])->name('welcome');
Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth'])->name('home');
Route::get('/admin-login', [UserController::class, 'admin'])->name('admin-login');



Route::group(['middleware' => 'auth'], function (){


   /*  Route::get('/home', [HomeController::class, 'index'])->name('home'); */
    Route::get('/profile/{id}', [UserController::class, 'show'])->name('profile');
    Route::get('/profile/{user}/edit', [UserController::class, 'profile_edit'])->name('profile.users.edit');
    Route::patch('/profile/{user}', [UserController::class, 'profile_update'])->name('profile.users.update');
    Route::get('/password/{user}/edit', [UserController::class, 'password_edit'])->name('password.users.edit');
    Route::patch('/password/{user}', [UserController::class, 'password_update'])->name('password.users.update');
    Route::get('/book/{book}', [BookController::class, 'show'])->name('book-detail');
    Route::get('/checkfavorite/{id}', [FavoritesController::class, 'checkFavorite'])->name('checkfavorite');
    Route::get('/checkranking/{id}/{stars}stars', [RankingController::class, 'checkRanking'])->name('checkranking');



    Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function(){


        /*  Route::get('/', [IndexController::class, index])->name('index'); */
        Route::resource('/roles', RoleController::class);
        Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
        Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');

        Route::resource('/permissions', PermissionController::class);
        Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
        Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');

        Route::resource('/users', UserController::class);
        Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
        Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
        Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
        Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');

        Route::resource('/admins', AdminController::class);
        Route::post('/admins/{admin}/roles', [AdminController::class, 'assignRole'])->name('admins.roles');
        Route::delete('/admins/{admin}/roles/{role}', [AdminController::class, 'removeRole'])->name('admins.roles.remove');
        Route::post('/admins/{admin}/permissions', [AdminController::class, 'givePermission'])->name('admins.permissions');
        Route::delete('/admins/{admin}/permissions/{permission}', [AdminController::class, 'revokePermission'])->name('admins.permissions.revoke');

        Route::resource('/categories', CategoryController::class);

        Route::resource('/books', BookController::class);
        Route::post('/books/{book}/categories', [BookController::class, 'attachCategory'])->name('books.categories');
        Route::delete('/books/{book}/categories/{category}', [BookController::class, 'detachCategory'])->name('books.categories.detach');



    });
});

require __DIR__.'/auth.php';
