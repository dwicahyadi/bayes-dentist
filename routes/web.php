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

Auth::routes();

Route::group(['middleware'=>'auth',], function (){
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.user');
    Route::get('diagnose', [App\Http\Controllers\HomeController::class, 'diagnose'])->name('diagnose.create');
    Route::post('diagnose', [App\Http\Controllers\DiagnoseController::class, 'store'])->name('diagnose.store');
    Route::get('diagnose/{diagnose}', [App\Http\Controllers\DiagnoseController::class, 'show'])->name('diagnose.show');
    Route::get('history', [App\Http\Controllers\HomeController::class, 'history'])->name('history');
    Route::get('diseases_information', [App\Http\Controllers\HomeController::class, 'diseases_information'])->name('diseases_information');
    Route::get('profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::put('profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/password', [App\Http\Controllers\ProfileController::class, 'update_password'])->name('profile.update_password');

    Route::group(['middleware'=>'isAdmin', 'prefix'=>'admin/'], function (){
        Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::resource('symptom',\App\Http\Controllers\SymptomController::class);
        Route::resource('disease',\App\Http\Controllers\DiseaseController::class);
        Route::resource('user',\App\Http\Controllers\UserController::class);
        Route::get('rule',[\App\Http\Controllers\RuleController::class, 'index'])->name('rule.index');
        Route::get('rule/{disease_id}/edit',[\App\Http\Controllers\RuleController::class, 'edit'])->name('rule.edit');
        Route::put('rule/{disease_id}/',[\App\Http\Controllers\RuleController::class, 'update'])->name('rule.update');
        Route::get('diagnose',[\App\Http\Controllers\DiagnoseController::class,'index'])->name('diagnose.index');
        Route::get('diagnose/{diagnose}', [App\Http\Controllers\DiagnoseController::class, 'show'])->name('diagnose.detail');
        Route::get('report',[\App\Http\Controllers\ReportController::class,'index'])->name('report');
    });
});

