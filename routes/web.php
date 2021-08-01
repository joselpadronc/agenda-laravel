<?php

use Illuminate\Support\Facades\Route;

// My Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\EmailsController;
use App\Http\Controllers\PhonesController;

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

// Auth
Route::get('/login', [AuthController::class, 'login_view'])->name('login')->middleware('guestUser');
Route::post('/login', [AuthController::class, 'login_auth'])->name('auth-login')->middleware('guestUser');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('authUser');

// Contacts
Route::get('/', [ContactsController::class, 'index'])
        ->name('home')
        ->middleware('authUser');
Route::get('/contacts/{id}/detail', [ContactsController::class, 'detail_contact'])
        ->name('detail-contact')
        ->middleware('authUser');
Route::get('/contacts/create', [ContactsController::class, 'create_contact'])
        ->name('create-contact')
        ->middleware('authUser', 'adminUser');
Route::post('/contacts/create', [ContactsController::class, 'save_contact'])
        ->name('save-contact')
        ->middleware('authUser', 'adminUser');
Route::put('/contacts/{id}/edit', [ContactsController::class, 'edit_contact'])
        ->name('edit-contact')
        ->middleware('authUser', 'adminUser');
Route::put('/contacts/delete', [ContactsController::class, 'delete_contact'])
        ->name('delete-contact')
        ->middleware('authUser', 'adminUser');

// Emails
Route::post('/emails/create/contact/{contactId}', [EmailsController::class, 'save_email'])
        ->name('create-email')
        ->middleware('authUser', 'adminUser');
Route::put('/emails/edit/contact/{contactId}', [EmailsController::class, 'edit_email'])
        ->name('edit-email')
        ->middleware('authUser', 'adminUser');
Route::get('/emails/delete/{id}/contact/{contactId}', [EmailsController::class, 'delete_email'])
        ->name('delete-email')
        ->middleware('authUser', 'adminUser');

// Phones
Route::post('/phones/create/contact/{contactId}', [PhonesController::class, 'save_phone'])
        ->name('create-phone')
        ->middleware('authUser', 'adminUser');
Route::put('/phones/edit/contact/{contactId}', [PhonesController::class, 'edit_phone'])
        ->name('edit-phone')
        ->middleware('authUser', 'adminUser');
Route::get('/phones/delete/{id}/contact/{contactId}', [PhonesController::class, 'delete_phone'])
        ->name('delete-phone')
        ->middleware('authUser', 'adminUser');