<?php

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Verify;
use App\Http\Livewire\ContactPage;
use App\Http\Livewire\ProductForm;
use App\Http\Livewire\ProfilePage;
use App\Http\Livewire\WelcomePage;
use App\Http\Livewire\MyOrdersPage;
use App\Http\Livewire\ProductsPage;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\DiffusionForm;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\DiffusionsPage;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\OrdersPage;
use App\Http\Livewire\NotificationForm;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\NotificationsPage;
use App\Http\Livewire\ProductDetailPage;
use App\Http\Livewire\Admin\PaymentsPage;
use App\Http\Controllers\ProductController;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\AdminAuth\LoginController;
use App\Http\Controllers\Api\Admin\ProduitController;
use App\Http\Controllers\AdminAuth\RegisterController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\AdminAuth\ResetPasswordController;
use App\Http\Controllers\AdminAuth\ForgotPasswordController;
use App\Http\Livewire\Admin\ProductsPage as AdminProductsPage;
use App\Http\Livewire\Admin\DiffusionsPage as AdminDiffusionsPage;
use App\Http\Livewire\Admin\NotificationsPage as AdminNotificationsPage;
use App\Http\Livewire\Admin\Slideshow;
use App\Http\Livewire\ContactMessagesPage;
use App\Http\Livewire\StatistiquePage;
use App\Http\Livewire\Admin\ProduitManage;
use App\Http\Livewire\AdminUsersPage;
use App\Http\Livewire\Admin\AdminProfilePage;
use App\Http\Controllers\Admin\ProduitManageController;

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

// Route::view('/', 'welcome')->name('home');

// Route::get('/', function(){
//     Auth::logout();
// });
// Route::middleware(['auth'])->group(function () {
Route::get('/', WelcomePage::class)->name('home');
Route::get('/products', ProductsPage::class)->name('products');
Route::get('/products/{id}', ProductDetailPage::class)->name('product.details');
// Route::get('/products/{id}/download', [ProductController::class, 'download'])->name('product.download');
Route::get('/products/{id}/download', [ProductController::class, 'downloadImages'])->name('product.download');
Route::get('/profile', ProfilePage::class)->name('profile');
Route::get('/notifications', NotificationsPage::class)->name('notifications');
// Route::get('/Notifications/{id}', NotificationDetailPage::class)->name('Notification.details');
Route::get('/diffusion', DiffusionsPage::class)->name('diffusion');
Route::get('/diffusions', DiffusionsPage::class)->name('diffusions');
Route::get('/myorders', MyOrdersPage::class)->name('myorders');
Route::get('/historique', [HomeController::class, 'historique'])->name('historique');
Route::get('/aide', [HomeController::class, 'aide'])->name('aide');
Route::get('/contact', ContactPage::class)->name('contact');

// });

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});

/**
 * Admin
 */

// Route::middleware(['auth', 'admin'])->group(function () {
Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');

    Route::get('/payments', PaymentsPage::class)->name('payments');
    Route::get('/payment/create', PaymentsPage::class)->name('payments.create');
    Route::get('/diffusions', AdminDiffusionsPage::class)->name('diffusions');
    Route::get('/diffusion/create', DiffusionForm::class)->name('diffusion.create');
    Route::get('/diffusion/{id}/edit', DiffusionForm::class)->name('diffusion.edit');
    Route::get('/messages', ContactMessagesPage::class)->name('contact-messages');
    Route::get('/product/create', ProductForm::class)->name('vente.create');
    Route::get('/products', AdminProductsPage::class)->name('products');
    Route::get('/products/{id}', AdminProductsPage::class)->name('product.details');
    Route::get('/product/{id}/edit', ProductForm::class)->name('vente.edit');
    Route::post('/products/{id}/delete', [ProduitController::class, 'delete'])->name('product.destroy');
    Route::post('/product-edit-image', ProduitManage::class)->name('product.edit.image');
//    Route::post('/product-manage-edit-image', [ProduitManageController::class, 'edit_produit_image'])->name('product.edit_produit_image');
    Route::get('/products/{id}/download', [ProductController::class, 'download'])->name('product.download');
    Route::get('/profile', AdminProfilePage::class)->name('profile');
    Route::get('/notification/{id}/edit', NotificationForm::class)->name('notification.edit');
    Route::get('/notification/create', NotificationForm::class)->name('notification.create');
    Route::get('/notifications', AdminNotificationsPage::class)->name('notifications');
    Route::get('/utilisateurs', AdminUsersPage::class)->name('utilisateurs');
    Route::get('/diffusion', AdminDiffusionsPage::class)->name('diffusion');
    Route::get('/diffusions', AdminDiffusionsPage::class)->name('diffusions');
    Route::get('/orders', OrdersPage::class)->name('orders');
    Route::get('/slideshow', Slideshow::class)->name('slideshow');
    Route::get('/statistique', StatistiquePage::class)->name('statistique');

});
// });

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'AdminAuth\LoginController@login');
    Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

    Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'AdminAuth\RegisterController@register');

    Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});


//
// Diffusion
// Localisation
// Type Prix
// Type transaction
// Commandes
// Route::group(['prefix' => 'admin'], function () {
//     Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
//     Route::post('/login', [LoginController::class, 'login']);
//     Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//     Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
//     Route::post('/register', [RegisterController::class, 'register']);

//     Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.request');
//     Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.email');
//     Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.reset');
//     Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm']);
//   });
