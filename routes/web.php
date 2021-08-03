<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\PagesController;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;

use Carbon\Carbon;
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

Route::redirect('/', 'dashboard');

//only logged in users can access this routes
Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::post('/tickets/{ticket}/page', [PagesController::class, 'store_page']);
    
    Route::post('/ticket/{ticket}/note', [NotesController::class, 'new_note']);
    
    Route::put('/users/{user}/resetPassword', [UsersController::class, 'resetPassword'])->middleware('isAdmin');

    // Route::resource('tickets.notes', [NoteController::class]);
    
    Route::get('/note/{note}', [NotesController::class, 'show']);
    Route::get('/note/{note}/edit', [NotesController::class, 'edit']);
    Route::put('/note/{note}', [NotesController::class,'update']);
    Route::delete('/note/{note}', [NotesController::class, 'destroy']);
    
    Route::resource('/users', UsersController::class)->middleware('isAdmin');
    Route::resource('/tickets', TicketsController::class);
    Route::resource('/avatars', AvatarController::class);
}); 

// Routes below are open to public viewing

Route::get('/tickets/{ticket}', [TicketsController::class, 'show']);

Route::get('ticket/page/{page}/notes', [NotesController::class, 'filterByPage']);

Route::get('/search', [TicketsController::class, 'search']); //search-route

Route::get('/dashboard', [TicketsController::class, 'dashboard']);
