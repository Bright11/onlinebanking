<?php

use App\Http\Controllers\backend\homecontroller;
use App\Http\Controllers\backend\registerCountroller;
use App\Http\Controllers\customerController;
use App\Http\Controllers\frontend\frontendController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

Route::get('/',[homecontroller::class,'index'])->name('index');

Route::get('register',[registerCountroller::class,'register'])->name('register');
Route::post('/insertregister',[registerCountroller::class,'insertregister'])->name('insertregister');
Route::get('login',[registerCountroller::class,'login'])->name('login');
Route::post('/insertlogin',[registerCountroller::class,'insertlogin'])->name('insertlogin');

Route::get('registeredusers',[registerCountroller::class,'registeredusers'])->name('registeredusers');
Route::get('logout',[registerCountroller::class,'logout'])->name('logout');


//openning account
Route::get('openaccount/{id}',[customerController::class,'openaccount'])->name('openaccount');
Route::post('/addopenaccount/{id}',[customerController::class,'addopenaccount'])->name('addopenaccount');
Route::get('transfer/{user_id}',[customerController::class,'transfer'])->name('transfer');
Route::get('customers',[customerController::class,'customers'])->name('customers');
Route::post('/addtransfer/{user_id}',[customerController::class,'addtransfer'])->name('addtransfer');

Route::get('/withdraw/{user_id}',[customerController::class,'withdraw'])->name('withdraw');
Route::post('/addwithdarw/{user_id}',[customerController::class,'addwithdarw'])->name('addwithdarw');

Route::get('/deposit/{user_id}',[customerController::class,'deposit'])->name('deposit');
Route::post('/adddeposit/{user_id}',[customerController::class,'adddeposit'])->name('adddeposit');

Route::get('/prodetail',[frontendController::class,'prodetail'])->name('prodetail');
Route::get('depositdetails',[frontendController::class,'depositdetails'])->name('depositdetails');
Route::get('withdrawerdetails',[frontendController::class,'withdrawerdetails'])->name('withdrawerdetails');