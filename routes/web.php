<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\{RegisteredMembers, Events, PartnersList, UploadLiveLink, DonationList};
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Web\MemberRegistration;
use App\Http\Livewire\Admin\{MembersDepartmentList, PartnerDonations};
use App\Http\Livewire\Web\{Partnership, PartnerLogin, PartnerDashboard, PartnerPasswordReset, PartnerChangePassword};
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

Route::view('/', 'welcome');
Route::view('/email', 'emails.partner.password_reset');


//auth()->loginUsingId(1);

Route::view('/contact_us', 'contact');
Route::view('/our_pastors', 'pastors')->name('pastors');
Route::view('/about_us', 'about');
Route::view('/events', 'events');
Route::view('/ministries', 'ministries');
Route::view('/privacy_policy', 'privacy_policy')->name('privacy_policy');
Route::view('/terms_conditions', 'terms_conditions')->name('terms_conditions');
Route::get('/member/register', MemberRegistration::class)->name('member.register');
Route::get('/partner/donation', MemberRegistration::class)->name('partner.donation');
Route::view('/donate', 'donate')->name('donate');
Route::get('/verify/payment', [WebsiteController::class, 'verifyPayment']);

Route::get('/partner/login', PartnerLogin::class)->name('partner.login')->middleware(['notGuard']);
Route::get('/donation/join', Partnership::class)->name('partner.join')->middleware('notGuard');
Route::get('/partner/reset/password', PartnerPasswordReset::class)->name('partner.reset.password')->middleware('notGuard');
Route::get('/partner/change/password/{email}/{token}', PartnerChangePassword::class)->name('partner.change.password')->middleware('notGuard');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/members/list', RegisteredMembers::class)->name('members.list');
    Route::get('/events/list', Events::class)->name('events.list');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/members/departments', MembersDepartmentList::class)->name('members.departments');
    Route::view('/settings', 'settings');
    Route::get('/partners/list', PartnersList::class)->name('partners.list');
    Route::get('/partners/donation', PartnerDonations::class)->name('partners.donations');
    Route::get('/live/coverage/upload', UploadLiveLink::class)->name('link.upload');
    Route::get('/donations/list', DonationList::class)->name('donations.list');
});

Route::middleware(['auth:partner'])->group(function () {
    Route::get('partner/dashboard', PartnerDashboard::class)->name('partner.dashboard');
});







