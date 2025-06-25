<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Dom\Attr;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function() {
    Route::get('register','register')->name('register');
    Route::post('register','registerSave')->name('register.save');

    Route::get('login','login')->name('login');
    Route::post('login','loginAction')->name('login.action');

    Route::post('logout',function() {
        Auth::logout();
        return redirect('/login');})->name('logout');
    
});    

Route::middleware('auth')->group(function(){
    Route::get('dashboard',function(){
        return view('dashboard');
    })->name('dashboard');

    Route::controller(ProductController::class)->prefix('products')->group(function(){
        Route::get('','index')->name('products');
        Route::get('create','create')->name('products.create');
        Route::post('store','store')->name('products.store');
        Route::get('show/{id}','show')->name('products.show');
        Route::get('edit/{id}','edit')->name('products.edit');
        Route::put('edit/{id}','update')->name('products.update');
        Route::delete('destroy/{id}','destroy')->name('products.destroy');
    });

    Route::get('/profile',[App\Http\Controllers\AuthController::class,'profile'])->name('profile');
});

   Route::controller(StudentController::class)->middleware('adminAuth')->prefix('students')->group(function(){
    Route::get('','index')->name('students');
    Route::get('create','create')->name('students.create');
    Route::post('store','store')->name('students.store');
    Route::delete('destroy/{id}','destroy')->name('students.destroy');
    Route::get('edit/{id}','edit')->name('students.edit');
    
   });

   Route::controller(GradeController::class)->middleware('adminAuth')->prefix('grades')->group(function(){
   Route::get('','index')->name('grades');
   Route::get('create','create')->name('grades.create');
   Route::post('store','store')->name('grades.store');
   Route::get('edit/{id}','edit')->name('grades.edit');
   Route::put('edit/{id}','update')->name('grades.update');
   Route::delete('destroy/{id}','destroy')->name('grades.destroy');
   });

   Route::controller(SectionController::class)->middleware('adminAuth')->prefix('sections')->group(function(){
    Route::get('','index')->name('sections');
    Route::get('create','create')->name('sections.create');
    Route::post('store','store')->name('sections.store');
    Route::get('edit/{id}','edit')->name('sections.edit');
    Route::put('edit/{id}','update')->name('sections.update');
    Route::delete('destroy/{id}','destroy')->name('sections.destroy');

   });

   Route::controller(TeacherController::class)->prefix('teacher')->group(function(){
    Route::get('','index')->name('teacher');
    Route::get('create','create')->name('teacher.create');
    Route::post('store','store')->name('teacher.store');

   });

   Route::controller(NewsController::class)->prefix('news')->group(function(){
   Route::get('','index')->name('news');
   Route::get('create','create')->name('news.create');
   Route::post('store','store')->name('news.store');
   });

   Route::controller(CategoryController::class)->prefix('category')->group(function(){
    Route::get('','index')->name('category');
    Route::get('create','create')->name('category.create');
    Route::post('store','store')->name('category.store');
   });