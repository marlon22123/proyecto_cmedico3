<?php

use App\Http\Controllers\AssingsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProofController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\CashoutController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;

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
    return view('home');
})->middleware(['auth']);


Auth::routes();

Route::middleware(['auth'])->group(function () {
    


Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('services', [ServiceController::class, 'index'])->name('services');

Route::get('customers', [CustomerController::class, 'index'])->name('customers');

Route::get('sales/create', [SaleController::class, 'create'])->name('sales.create');

Route::get('sales', [SaleController::class, 'index'])->name('sales.index');
Route::get('sales/{sale}/preview', [SaleController::class, 'preview'])->name('sales.preview');
Route::get('sales/{sale}/pdf', [SaleController::class, 'pdf'])->name('sales.pdf');
Route::get('sales/{sale}/ticket', [SaleController::class, 'pdf_ticket'])->name('sales.pdf.ticket');
Route::get('sales/{sale}/donwloadpdf', [SaleController::class, 'donwload_pdf'])->name('sales.donwload.pdf');

Route::get('proof', [ProofController::class, 'index'])->name('proof.index');
Route::get('proof/{sale}/preview', [ProofController::class, 'preview'])->name('proof.preview');
Route::get('proof/{sale}/pdf', [ProofController::class, 'pdf'])->name('proof.pdf');
Route::get('proof/{sale}/ticket', [ProofController::class, 'pdf_ticket'])->name('proof.pdf.ticket');
Route::get('proof/{sale}/donwloadpdf', [ProofController::class, 'donwload_pdf'])->name('proof.donwload.pdf');

Route::get('cashout', [CashoutController::class, 'index'])->name('cashout.index');
Route::get('roles', [RolesController::class, 'index'])->name('roles.index');
Route::get('permisos', [PermisoController::class, 'index'])->name('permisos.index');
Route::get('assigns', [AssingsController::class, 'index'])->name('assigns.index');
Route::get('users', [UsersController::class, 'index'])->name('users.index');

});

Route::get('prue', function () {
    $url=route('home');
    return $url;
});

