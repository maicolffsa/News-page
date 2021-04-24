<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProvinciaController;
use App\Http\Controllers\Backend\DistritoController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\AdsController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\WebsiteSettingController;
use App\Http\Controllers\Frontend\ExtraController;
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

Route::get('/', function () {
    return view('main.home');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// Admin Logout 
Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

// Admin Category All Routes 

Route::get('/categories', [CategoryController::class, 'Index'])->name('categories');
Route::get('/add/category', [CategoryController::class, 'AddCategory'])->name('add.category');
Route::post('/store/category', [CategoryController::class, 'StoreCategory'])->name('store.category');

Route::get('/edit/category/{id}', [CategoryController::class, 'EditCategory'])->name('edit.category');

Route::post('/update/category/{id}', [CategoryController::class, 'UpdateCategory'])->name('update.category');

Route::get('/delete/category/{id}', [CategoryController::class, 'DeleteCategory'])->name('delete.category');


// Admin SubCategory All Routes 
Route::get('/subcategories', [SubCategoryController::class, 'Index'])->name('subcategories');

Route::get('/add/subcategory', [SubCategoryController::class, 'AddSubCategory'])->name('add.subcategory');

Route::post('/store/subcategory', [SubCategoryController::class, 'StoreSubCategory'])->name('store.subcategory');

Route::get('/edit/subcategory/{id}', [SubCategoryController::class, 'EditSubCategory'])->name('edit.subcategory');

Route::post('/update/subcategory/{id}', [SubCategoryController::class, 'UpdateSubCategory'])->name('update.subcategory');

Route::get('/delete/subcategory/{id}', [SubCategoryController::class, 'DeleteSubCategory'])->name('delete.subcategory');

// Admin Provincia All Routes 
Route::get('/provincia', [ProvinciaController::class, 'Index'])->name('provincia');

Route::get('/add/provincia', [ProvinciaController::class, 'AddProvincia'])->name('add.provincia');

Route::post('/store/provincia', [ProvinciaController::class, 'StoreProvincia'])->name('store.provincia');

Route::get('/edit/provincia/{id}', [ProvinciaController::class, 'EditProvincia'])->name('edit.provincia');

Route::post('/update/provincia/{id}', [ProvinciaController::class, 'UpdateProvincia'])->name('update.provincia');

Route::get('/delete/provincia/{id}', [ProvinciaController::class, 'DeleteProvincia'])->name('delete.provincia');

// Admin Distrito All Routes 
Route::get('/distrito', [DistritoController::class, 'Index'])->name('distrito');

Route::get('/add/distrito', [DistritoController::class, 'AddDistrito'])->name('add.distrito');

Route::post('/store/distrito', [DistritoController::class, 'StoreDistrito'])->name('store.distrito');

Route::get('/edit/distrito/{id}', [DistritoController::class, 'EditDistrito'])->name('edit.distrito');

Route::post('/update/distrito/{id}', [DistritoController::class, 'UpdateDistrito'])->name('update.distrito');

Route::get('/delete/distrito/{id}', [DistritoController::class, 'DeleteDistrito'])->name('delete.distrito');

// Json Data for Category and Provincia
Route::get('/get/subcategory/{category_id}', [PostController::class, 'GetSubCategory']);

Route::get('/get/Distrito/{provincia_id}', [PostController::class, 'GetDistrito']);



// Admin Posts All Routes
Route::get('/allpost', [PostController::class, 'index'])->name('all.post');

Route::get('/createpost', [PostController::class, 'Create'])->name('create.post');

Route::post('/store/post', [PostController::class, 'StorePost'])->name('store.post');

Route::get('/edit/post/{id}', [PostController::class, 'EditPost'])->name('edit.post');

Route::post('/update/post/{id}', [PostController::class, 'UpdatePost'])->name('update.post');

Route::get('/delete/post/{id}', [PostController::class, 'DeletePost'])->name('delete.post');

// Social Settings 
Route::get('/social/setting', [SettingController::class, 'SocialSetting'])->name('social.setting');

Route::post('/social/update/{id}', [SettingController::class, 'SocialUpdate'])->name('update.social');

// Seo Settings Routes

Route::get('/seo/setting', [SettingController::class, 'SeoSetting'])->name('seo.setting');

Route::post('/seo/update/{id}', [SettingController::class, 'SeoUpdate'])->name('update.seo');

/// Prayers Setting Routes 

Route::get('/prayer/setting', [SettingController::class, 'PrayerSetting'])->name('prayer.setting');

Route::post('/prayer/update/{id}', [SettingController::class, 'PrayerUpdate'])->name('update.prayer');


// Live Tv Setting 
Route::get('/livetv/setting', [SettingController::class, 'LiveTvSetting'])->name('livetv.setting');

Route::post('/livetv/update/{id}', [SettingController::class, 'LivetvUpdate'])->name('update.livetv');

Route::get('/livetv/active/{id}', [SettingController::class, 'ActiveSetting'])->name('active.livetv');

Route::get('/livetv/deactive/{id}', [SettingController::class, 'DeActiveSetting'])->name('deactive.livetv');

// Notice Setting Route
Route::get('/notice/setting', [SettingController::class, 'NoticeSetting'])->name('notice.setting');

Route::post('/notice/update/{id}', [SettingController::class, 'NoticeUpdate'])->name('update.notice');

Route::get('/notice/active/{id}', [SettingController::class, 'ActiveNoticeSetting'])->name('active.notice');

Route::get('/notice/deactive/{id}', [SettingController::class, 'DeActiveNoticeSetting'])->name('deactive.notice');

// Website LiNK Route 
Route::get('/website/setting', [SettingController::class, 'WebsiteSetting'])->name('all.website');

Route::get('/add/website', [SettingController::class, 'AddWebsiteSetting'])->name('add.website');

Route::post('/store/website', [SettingController::class, 'StoreWebsite'])->name('store.website');


// Photo Gallery Routes 
Route::get('/photo/gallery', [GalleryController::class, 'PhotoGallery'])->name('photo.gallery');

Route::get('/add/photo', [GalleryController::class, 'AddPhoto'])->name('add.photo');

Route::post('/store/photo', [GalleryController::class, 'StorePhoto'])->name('store.photo');

// Video Gallery Routes 

Route::get('/video/gallery', [GalleryController::class, 'VideoGallery'])->name('video.gallery');

Route::get('/add/video', [GalleryController::class, 'AddVideo'])->name('add.video');

Route::post('/store/video', [GalleryController::class, 'StoreVideo'])->name('store.video');


// FRONTEND 
// Multi Langusage Routes 

Route::get('/lang/spanish', [ExtraController::class, 'Spanish'])->name('lang.spanish');

// Single Post Page 

Route::get('/view/post/{id}', [ExtraController::class, 'SinglePost']);

// Post Category and Subcategory Pages 

Route::get('/catpost/{id}/{category_es}', [ExtraController::class, 'CatPost']);

Route::get('/subcatpost/{id}/{subcategory_es}', [ExtraController::class, 'SubCatPost']);

// Search Provincia In Home page 

Route::get('/get/distrito/frontend/{provincia_id}', [ExtraController::class, 'GetSubDist']);

Route::get('/search/provincia', [ExtraController::class, 'SearchProvincia'])->name('searchby.provincias');

// Ads Backend Section Route

Route::get('/list/add', [AdsController::class, 'ListAds'])->name('list.add');

Route::get('/add/ads', [AdsController::class, 'AddAds'])->name('add.ads');

Route::post('/store/ads', [AdsController::class, 'StoreAds'])->name('store.ads');

// Writer Role Routes

Route::get('/add/writer', [RoleController::class, 'InsertWriter'])->name('add.writer');

Route::post('/store/writer', [RoleController::class, 'StoreWriter'])->name('store.writer');

Route::get('/all/writer', [RoleController::class, 'AllWriter'])->name('all.writer');

Route::get('/edit/writer/{id}', [RoleController::class, 'EditWriter'])->name('edit.writer');

Route::post('/update/writer/{id}', [RoleController::class, 'UpdateWriter'])->name('update.writer');

// All Website Setting Routes 

Route::get('/web/setting', [WebsiteSettingController::class, 'MainWebSetting'])->name('website.setting');

Route::post('/update/websetting/{id}', [WebsiteSettingController::class, 'UpdateWebSetting'])->name('update.websetting');

 