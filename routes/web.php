<?php

use App\Http\Controllers\authentications\AuthController;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MesjidController;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\pages\OauthClientPage;
use App\Http\Controllers\pages\ProfilePage;
use App\Http\Controllers\pages\UserPage;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\CmsAdminLoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Beranda

// Galeri



// Berita

// Informasi
Route::get('/informasi', function(){
  return view('client.informasi.index');
})->name('informasi');
// Donasi
Route::get('/donasi', function(){
  return view('client.donasi.index');
})->name('donasi');

// Auth

Route::get('/admin/login', [CmsAdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [CmsAdminLoginController::class, 'login']);
Route::post('/admin/logout', [CmsAdminLoginController::class, 'logout'])->name('admin.logout');

Route::middleware('cms_admin')->group(function() {
    Route::get('/admin/dashboard', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

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

$controller_path = 'App\Http\Controllers';
Route::get('/login', $controller_path . '\authentications\LoginBasic@index')->name('login');
// Main Page Route
Route::get('/', $controller_path . '\pages\LandingPage@index')->name('pages-landing');
// After Login
Route::group(
  [
    'middleware' => 'auth',
  ],
  function () {
    // Role Guest
    Route::get('/home', [HomePage::class, 'index'])->name('pages-home');
    Route::get('/profile/{id}', [ProfilePage::class, 'index'])->name('pages-profile');
    // Logout
    Route::post('/logout', [LoginBasic::class, 'logout'])->name('logout');
    Route::get('/logout', [LoginBasic::class, 'logout'])->name('logout');
    // Route Middleware for ADMIN
    //User
    Route::get('/user/user-show-all', [UserController::class, 'showAll'])->name('user-show-all');
    Route::get('/user/user-show', [UserPage::class, 'index'])->name('pages-user-show');
    Route::get('/user/user-inactive', [UserPage::class, 'user_inactive'])->name('pages-user-inactive');
    Route::get('/user/getdata', [UserPage::class, 'getDatatableUser'])->name('user.getdata');
    Route::get('/user/getdatainactive', [UserPage::class, 'getDatatableUserInactive'])->name('user.getdata.inactive');
    // Action User
    Route::post('/user/user-store', [UserPage::class, 'store'])->name('pages-user-store');
    Route::post('/user/user-go-to-inactive', [UserPage::class, 'goToInActiveUser'])->name(
      'pages-user-go-to-inactive'
    );
    Route::post('/user/user-go-to-active', [UserPage::class, 'goToActiveUser'])->name('pages-user-go-to-active');
    Route::post('/user/user-resend-activation', [UserPage::class, 'resendActivation'])->name(
      'pages-user-resend-activation'
    );
    Route::post('/user/user-show-detail', [UserPage::class, 'show'])->name('pages-user-show-detail');
    Route::post('/user/user-destroy', [UserPage::class, 'destroy'])->name('pages-user-destroy');
    Route::post('/user/user-update', [UserPage::class, 'update'])->name('pages-user-update');
    Route::post('/user/user-update-password', [UserPage::class, 'updatePassword'])->name(
      'pages-user-update-password'
    );
    // role
    Route::get('masters/roles', [RolesController::class, 'index'])->name('master.roles.index');
    Route::get('/roles/edit/{ref}', [RolesController::class, 'edit'])->name('roles.setting.edit');
    Route::post('/roles/save', [RolesController::class, 'store'])->name('roles.setting.save');
    Route::post('/roles/delete/{ref}', [RolesController::class, 'destroy'])->name('roles.setting.delete');
    Route::get('/getroles/{ref}', [RolesController::class, 'view'])->name('roles.setting.view');
    //mesjid
    Route::get('masters/mesjid', [MesjidController::class, 'index'])->name('mst.mesjid.view');
    Route::post('masters/mesjid/store', [MesjidController::class, 'store'])->name('mst.mesjid.store');  
    Route::get('masters/mesjid/edit', [MesjidController::class, 'edit'])->name('mst.mesjid.edit');
    Route::post('masters/mesjid/destroy/{ref}', [MesjidController::class, 'destroy'])->name('mst.mesjid.delete');
    Route::get('mesjid/profile', [MesjidController::class, 'profile'])->name('mst.mesjid.profile');
    Route::get('mesjid/profile/{ref}', [MesjidController::class, 'profileMesjid'])->name('mst.mesjid.profilemesjid');
    Route::get('getmesjid/{ref_mesjid}', [MesjidController::class, 'view'])->name('mesjid.get');
    Route::get('masters/mesjid/members', [MesjidController::class, 'members'])->name('mst.mesjid.member');
    Route::get('mesjid/members/{ref}', [MesjidController::class, 'membersmesjid'])->name('mst.mesjid.membermesjid');
    Route::get('masters/mesjid/pinjaman', [MesjidController::class, 'pinjaman'])->name('mst.mesjid.pinjaman');
    Route::get('mesjid/pinjaman/{ref}', [MesjidController::class, 'pinjamanmesjid'])->name('mst.mesjid.pinjamanmesjid');

    Route::get('getjmlmember/{ref}', [MemberController::class, 'findJumlah'])->name('findjumlahmember');
    Route::get('getjmlpinjaman/{ref}', [PinjamanController::class, 'findJumlah'])->name('findjumlahpinjaman');
    Route::get('getjmlpeminjam/{ref}', [PinjamanController::class, 'CountPeminjam'])->name('findjumlahpeminjam');
    Route::get('getjumlahpinjaman/{ref}', [PinjamanController::class, 'SumPinjamanBlmLunas'])->name('findSumjumlah');
    Route::get('getpinjaman/{ref}', [PinjamanController::class, 'view'])->name('mesjid.get');    
    Route::post('pinjaman/destroy/{ref}', [PinjamanController::class, 'destroy'])->name('mst.pinjaman.delete');

    // admin
    Route::get('getjmlmesjidall', [MesjidController::class, 'findJumlahall'])->name('findjumlahmesjidall');
    Route::get('getjmlmemberall', [MemberController::class, 'findJumlahall'])->name('findjumlahmemberall');
    Route::get('getjmlpinjamanall', [PinjamanController::class, 'findJumlahAll'])->name('findjumlahpinjamanall');
    Route::get('getjmlpeminjamall', [PinjamanController::class, 'CountPeminjamAll'])->name('findjumlahpeminjamall');
    Route::get('getjumlahpinjamanall', [PinjamanController::class, 'SumPinjamanBlmLunasAll'])->name('findSumjumlahall');
    Route::get('getpinjamanall', [PinjamanController::class, 'view'])->name('mesjid.getall');    

    // all 
    Route::get('members/all', [MemberController::class, 'index'])->name('mst.member');
    Route::get('pinjaman/all', [PinjamanController::class, 'index'])->name('mst.pinjaman');
    Route::get('/member/getall', [MemberController::class, 'getDatatableAll'])->name('member.getdataall');
    Route::get('/pinjaman/getall', [PinjamanController::class, 'getDatatableAll'])->name('pinjaman.getdataall');
    Route::get('member/view/{ref}', [MemberController::class, 'view'])->name('member.view.get');    
  }
    
);
// register
Route::post('masters/member/store', [MemberController::class, 'store'])->name('mst.member.store');  
Route::get('/member/getdata/{ref_mesjid}', [MemberController::class, 'getDatatable'])->name('mst.member.getdata');
// pinjaman
Route::get('/pinjaman/getdata/{ref_mesjid}', [PinjamanController::class, 'getDatatable'])->name('mst.pinjaman.getdata');
Route::get('/pinjaman/getdatablmproses/{ref_mesjid}', [PinjamanController::class, 'getDatatableBlmProses'])->name('mst.pinjaman.getdatablmproses');
Route::post('/pinjaman/store/{ref_mesjid}', [PinjamanController::class, 'store'])->name('mst.pinjaman.save');

// pages
Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');

// Login
Route::get('/auth/login-basic', $controller_path . '\authentications\LoginBasic@index')->name('auth-login-basic');
Route::post('/auth/login-post', $controller_path . '\authentications\LoginBasic@store')->name('auth-login-store');
Route::get('/auth/forgot-password', $controller_path . '\authentications\LoginBasic@forgot_password')->name(
  'auth-forgot-password'
);

Route::post(
  '/auth/forgot-password-send-link',
  $controller_path . '\authentications\LoginBasic@forgot_password_send_link'
)->name('auth-forgot-password-send-link');

Route::get(
  '/auth/forgot-password-form/{ref}',
  $controller_path . '\authentications\LoginBasic@forgot_password_form'
)->name('auth-forgot-password-form');

Route::post(
  '/auth/forgot-password-store',
  $controller_path . '\authentications\LoginBasic@forgot_password_store'
)->name('auth-forgot-password-store');

// Register user
Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name(
  'auth-register-basic'
);
Route::post('auth/register-store', $controller_path . '\authentications\RegisterBasic@store')->name(
  'auth-register-store'
);
Route::get(
  'auth/register-activation/{activation_code}',
  $controller_path . '\authentications\RegisterBasic@register_activation'
)->name('auth-register-activation');
// register member
Route::get('/member/register/{ref_mesjid}', [MemberController::class, 'register'])->name('member.register');
// register mesjid
Route::get('/mesjid/register', [MesjidController::class, 'register'])->name('mesjid.register');
Route::post('mesjid/register/store', [MesjidController::class, 'storeRegister'])->name('mst.mesjid.storeregister');  
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
