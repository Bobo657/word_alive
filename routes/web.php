<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\{RegisteredMembers, Events, PartnersList, UploadLiveLink, DonationList};
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Web\MemberRegistration;
use App\Http\Livewire\Admin\MembersDepartmentList;
use App\Http\Livewire\Web\{Partnership, PartnerLogin, PartnerSettings, PartnerMakePayment, PartnerDashboard, PartnerDonationHistory};
use Illuminate\Support\Facades\Redirect;

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

Route::view('/contact_us', 'contact');
Route::view('/our_pastors', 'pastors');
Route::view('/about_us', 'about');
Route::view('/events', 'events');
Route::view('/ministries', 'ministries');
Route::get('/member/register', MemberRegistration::class)->name('member.register');
Route::get('/partner/donation', MemberRegistration::class)->name('partner.donation');
Route::get('/donation/join', Partnership::class)->name('partner.join');
Route::view('/donate', 'donate')->name('donate');
Route::get('/verify/payment', [WebsiteController::class, 'verifyPayment']);
Route::get('/partner/login', PartnerLogin::class)->name('partner.login');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/members/list', RegisteredMembers::class)->name('members.list');
    Route::get('/events/list', Events::class)->name('events.list');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/members/departments', MembersDepartmentList::class)->name('members.departments');
    Route::view('/settings', 'settings');
    Route::get('/partners/list', PartnersList::class)->name('partners.list');
    Route::get('/live/coverage/upload', UploadLiveLink::class)->name('link.upload');
    Route::get('/donations/list', DonationList::class)->name('donations.list');
});


Route::middleware(['auth:partner'])->group(function () {
    Route::get('partner/dashboard', PartnerDashboard::class)->name('partner.dashboard');
});







