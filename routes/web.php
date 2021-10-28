<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\RevisorController;
use App\Models\Announcement;

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

Route::get('/',[PublicController::class,'index'])->name('home');

Route::get('/announcement/create',[AnnouncementController::class,'create'])->name('createAnnouncement');

Route::post('/announcement/store',[AnnouncementController::class,'store'])->name('storeAnnouncement');

Route::get('/category/{name}/{id}/announcements', [PublicController::class, 'announcementsByCategory'])->name('public.announcements.category');

Route::get('/announcement/detail/{announcement}', [PublicController::class, 'show'])->name('detail.announcement');

Route::get('/revisor/home',[RevisorController::class,'index'])->name('revisor.home');

Route::post('/revisor/announcement/{id}/accept',[RevisorController::class,'accept'])->name('revisor.accept');

Route::post('/revisor/announcement/{id}/reject',[RevisorController::class,'reject'])->name('revisor.reject');

Route::get('/revisor/request', [AnnouncementController::class, 'revisorRequest'])->name('revisorRequest');

Route::post('/revisor/request/submit', [AnnouncementController::class, 'revisorRequestSubmit'])->name('revisorRequestSubmit');

Route::get('/search', [PublicController::class, 'announcementsSearch'])->name('search');

Route::post('/announcement/images/upload', [AnnouncementController::class, 'uploadImage'])->name('announcement.images.upload');

Route::delete('/announcement/images/remove', [AnnouncementController::class, 'removeImage'])->name('announcement.images.remove');

Route::get('/announcement/images', [AnnouncementController::class, 'getImages'])->name('announcement.images');

Route::post('/locale/{locale}', [PublicController::class, 'locale'])->name('locale');

// Route::post('/esci', [AnnouncementController::class, 'esci'])->name('esci');


