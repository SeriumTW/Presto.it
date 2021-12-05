<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;
use Chatify\Http\Controllers\Api\MessagesController as ApiMessagesController;
use Chatify\Http\Controllers\MessagesController;

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

// public
Route::get('/', [PublicController::class, 'index'])->name('home');

// profilo 
Route::get('/profile', [PublicController::class, 'profile'])->name('profile');

// chi siamo
Route::get('/chi-siamo', [PublicController::class, 'chiSiamo'])->name('chi-siamo');

// public bandiere
Route::post('/locale/{locale}', [PublicController::class, 'locale'])->name('locale');

// annunci
Route::get('/announcement/index', [AnnouncementController::class, 'index'])->name('announcement.index');
Route::get('/announcement/create', [AnnouncementController::class, 'create'])->name('announcement.create');
Route::post('/announcement/store', [AnnouncementController::class, 'store'])->name('announcement.store');
Route::get('/announcement/show/{announcement}', [AnnouncementController::class, 'show'])->name('announcement.show');
Route::get('/announcement/{category}/search', [AnnouncementController::class, 'researchCategory'])->name('announcement.researchCategory');
Route::get('/search', [AnnouncementController::class, 'search'])->name('announcement.search');
Route::delete('/announcement/destroy/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');
Route::delete('/announcement/destroy', [AnnouncementController::class, 'destroyAll'])->name('announcement.destroy.all');

// dropzone
Route::post('/announcement/images/upload', [AnnouncementController::class, 'uploadImage'])->name('announcement.images.upload');
Route::delete('/announcement/images/remove', [AnnouncementController::class, 'removeImage'])->name('announcement.images.remove');
Route::get('/announcement/images', [AnnouncementController::class, 'getImages'])->name('announcement.images');

// revisione
Route::get('/revisor/dashboard', [RevisorController::class, 'index'])->name('revisor.dashboard');
Route::post('/revisor/accepted/{id}', [RevisorController::class, 'accepted'])->name('revisor.accepted');
Route::post('/revisor/rejected/{id}', [RevisorController::class, 'rejected'])->name('revisor.rejected');
Route::get('/lavora-con-noi', [RevisorController::class, 'create'])->name('revisor.lavoraConNoi')->middleware('auth');
Route::post('/lavora-con-noi/store', [RevisorController::class, 'store'])->name('revisor.store')->middleware('auth');
Route::get('/revisor/trashed', [RevisorController::class, 'trashed'])->name('revisor.trashed');

// admin
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::post('/admin/accepted/{id}', [AdminController::class, 'acceptedRevisor'])->name('admin.accepted');
Route::post('/admin/rejected/{id}', [AdminController::class, 'rejectedRevisor'])->name('admin.rejected');
Route::post('/admin/accepted/announcement/{id}', [AdminController::class, 'acceptedAnnouncementAdmin'])->name('admin.accepted.announcement');
Route::post('/admin/rejected/announcement/{id}', [AdminController::class, 'rejectedAnnouncementAdmin'])->name('admin.rejected.announcement');

Route::get('/messages/{user_id}', [MessagesController::class, 'updateContactItem'])->name('messages.contact');

