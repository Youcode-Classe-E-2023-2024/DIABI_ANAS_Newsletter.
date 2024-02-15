<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\NewsletterController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/create', function () {
        return view('admin.users.create');
    })->name('users.create'); // Moved inside the group
    Route::post('/users/{user}/roles/{role}', [UserController::class, 'assignRole'])->name('users.roles');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
});


Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

Route::get('/newsletter',[NewsletterController::class, 'index'] )->name('newsletter');
// Route::post('/subscribe',[NewsletterController::class, 'subscribe'] )->name('subscribe');
Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('subscribe');



Route::get('/generate-pdf', [PdfController::class, 'generatepdf'])->name('generate-pdf');