<?php

use App\Http\Controllers\CategoryCompanyController;
use App\Http\Controllers\CategorySubCategoryCompanyController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyProductController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('companies.show');
Route::get('/companies/{company}/products/{product}', [CompanyProductController::class, 'show'])->name('companies.products.show');

Route::middleware('auth')->group(function () {
    Route::get('/students/dashboard', [StudentController::class, 'dashboard'])->name('students.dashboard');
    Route::get('/students/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::patch('students', [StudentController::class, 'update'])->name('students.update');
});

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');


Route::view('/pages/instructions', 'page.instructions')->name('pages.instructions');

Route::get('/up-app', function () {
    Artisan::call('storage:link');
    Artisan::call('migrate');
});