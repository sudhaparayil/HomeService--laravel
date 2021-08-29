<?php
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\Customer\CustomerDashboardComponent;
use App\Http\Livewire\Sprovider\SproviderDashboardComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\ServiceCategoriesComponent;
use App\Http\Livewire\ServiceByCategoryComponent;
use App\Http\Livewire\Admin\AdminServiceCategory;
use App\Http\Livewire\Admin\AdminServicesByCategory;
use App\Http\Livewire\Admin\AdminServices;
use App\Http\Livewire\Admin\AdminAddServiceCategory;
use App\Http\Livewire\Admin\AdminAddServices;
use App\Http\Livewire\Admin\AdminEditServiceCategory;
use Illuminate\Support\Facades\Route;


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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',HomeComponent::class)->name('home');
Route::get('/service-categories',ServiceCategoriesComponent::class)->name('home.service_categories');
Route::get('/{category_slug}/services',ServiceByCategoryComponent::class)->name('home.services_by_categories');


//for customer
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/customer/dashboard',CustomerDashboardComponent::class)->name('customer.dashboard');
});



//for svp
Route::middleware(['auth:sanctum', 'verified','authsprovider'])->group(function(){
    Route::get('/sprovider/dashboard',SproviderDashboardComponent::class)->name('sprovider.dashboard');
});




//for admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function()
{
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/service-categories',AdminServiceCategory::class)->name('admin.service_categories');
    Route::get('/admin/service-category/add',AdminAddServiceCategory::class)->name('admin.add_service_category');
    Route::get('/admin/service-category/edit/{category_id}',AdminEditServiceCategory::class)->name('admin.edit_service_category');
    Route::get('/admin/all-services',AdminServices::class)->name('admin.all_services');
    Route::get('/admin/{category_slug}/services',AdminServicesByCategory::class)->name('admin.services_by_category');
    Route::get('/admin/services/add',AdminAddServices::class)->name('admin.add_services');


});
