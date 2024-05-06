<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkincareController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;


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


Route::middleware(['auth'])->group(function(){
    Route::get('/', [SkincareController::class, 'view'])->name('viewall');
    Route::prefix('admin')->middleware(['isAdmin'])->group(function(){
        Route::controller(SkincareController::class)->group(function(){
            Route::get('/', 'view')->name('viewall');
            Route::get('/additem', 'viewcreateform')->name('viewform');
            Route::post('/itemcreated', 'createitem')->name('create');
            Route::get('/edititem/{id}', 'editform')->name('editform');
            Route::patch('/edited/{id}', 'edit')->name('edited');
            Route::delete('/delete/{id}', 'delete')->name('delete');
            Route::controller(CategoryController::class)->group(function(){
                Route::get('/createnewcategory', 'createform')->name('createcategoryform');
                Route::post('/create-category', 'create')->name('create.category');
            });
        });
    });
});


// Route::controller(UserController::class)->group(function(){
//     Route::get('/registerForm', 'registerForm')->name('registerForm');
//     Route::post('/register', 'register')->name('register');
//     Route::get('/loginForm', 'loginForm')->name('loginForm');
//     Route::post('/login', 'login')->name('login');
//     Route::post('/logout', 'logout')->name('logout');
// });
