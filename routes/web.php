<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\PricingController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DtcController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\LibrariesController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\LinkSocialMediaController;
use App\Http\Controllers\Admin\AcademyController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Admin\VideoController;

/*
|--------------------------------------------------------------------------
*/
// Make storage:link
Route::get('/symlink', function () {
   $target =$_SERVER['DOCUMENT_ROOT'].'/storage/app/public';
   $link = $_SERVER['DOCUMENT_ROOT'].'/public/storage';
   symlink($target, $link);
   echo "Done";
});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin',
    'as' => 'admin.'
], function() {
    Route::resource('dashboard', DashboardController::class );
    Route::resource('users', AdminUserController::class );
    Route::resource('customers', CustomerController::class );
    Route::resource('items', ItemController::class );
    Route::resource('categories', CategoryController::class );
    Route::resource('types', TypeController::class );

    Route::resource('settings', SettingsController::class );
    

    Route::resource('slides', SlideController::class);
    Route::resource('dtcs', DtcController::class);

    //Pricing
    Route::resource('prices', PricingController::class);

    //Academy
    Route::resource('academies', AcademyController::class );
   
    //Support
    Route::resource('supports', SupportController::class );

    //Video

    Route::resource('videos', VideoController::class );
 
    Route::get('addmore', function(){
        dd('Add More Route Test Success');
    })->name('addmore');
});

    //Features

    Route::get('/admin/features',  [FeatureController::class , 'index'])->name('admin.features.index');
    Route::get('/admin/features/create' ,[FeatureController::class ,'create'])->name('admin.features.create');
    Route::post('/admin/features',[FeatureController::class ,'store'])->name('admin.features.store');
    Route::get('/admin/features/{id}/edit',[FeatureController::class ,'edit'])->name('admin.features.edit');
    Route::post('/admin/features/{id}',[FeatureController::class ,'update'])->name('admin.features.update');
    Route::delete('/admin/features/{id}/delete',[FeatureController::class ,'destroy'])->name('admin.features.destroy');


    //Libraries
    Route::get('/admin/libraries', [LibrariesController::class , 'index'])->name('admin.libraries.index');
    Route::get('/admin/libraries/create', [LibrariesController::class , 'create'])->name('admin.libraries.create');
    Route::post('/admin/libraries', [LibrariesController::class , 'store'])->name('admin.libraries.store');
    Route::get('/admin/libraries/{id}/edit', [LibrariesController::class , 'edit'])->name('admin.libraries.edit');
    Route::post('/admin/libraries/{id}', [LibrariesController::class , 'update'])->name('admin.libraries.update');
    Route::delete('/admin/libraries/{id}/delete', [LibrariesController::class , 'destroy'])->name('admin.libraries.destroy');

    //Hero section
  //  Route::get('/admin/hero', [HeroController::class ,'index'])->name('admin.hero.index');
    Route::get('/admin/hero/1/edit', [HeroController::class, 'edit'])->name('admin.hero.edit');
    Route::post('/admin/hero/1/update', [HeroController::class, 'update'])->name('admin.hero.update');


    //Link Socail Media
    Route::get('/admin/links', [LinkSocialMediaController::class ,'index'])->name('admin.links.index');
    Route::get('/admin/links/create', [LinkSocialMediaController::class ,'create'])->name('admin.links.create');
    Route::post('/admin/links', [LinkSocialMediaController::class ,'store'])->name('admin.links.store');
    Route::get('/admin/links/{id}/edit', [LinkSocialMediaController::class ,'edit'])->name('admin.links.edit');
    Route::post('/admin/links/{id}', [LinkSocialMediaController::class ,'update'])->name('admin.links.update');
    Route::delete('/admin/links/{id}/delete', [LinkSocialMediaController::class ,'destroy'])->name('admin.links.delete');
    
    //Client
    Route::get('/', [ClientController::class, 'homePage'] );
    Route::get('/pricing', [ClientController::class, 'pricing'] );
    Route::get('/academy', [ClientController::class, 'academy'] );
    Route::get('/support', [ClientController::class, 'support'] );
    Route::get('/video', [ClientController::class, 'video'] );


/*
|--------------------------------------------------------------------------
| End Admin Routes
|--------------------------------------------------------------------------
*/















Route::group([
    'middleware' => 'role:super-admin|admin'
], function() {
    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/{id}/delete', [PermissionController::class, 'destroy']);

    Route::resource('roles', RoleController::class);
    Route::get('roles/{id}/delete', [RoleController::class, 'destroy']);
    Route::get('roles/{id}/give-permissions', [RoleController::class, 'givePermissionsToRole']);
    Route::put('roles/{id}/give-permissions', [RoleController::class, 'updatePermissionsToRole']);

    Route::resource('users', UserController::class);
    Route::put('users/{user}/update-password', [UserController::class, 'updateUserPassword']);
    Route::get('users/{user}/delete', [UserController::class, 'destroy']);
});

Route::get('ckeditor4-demo', function() {
    return view('ckeditor-demo.ckeditor4-demo');
})->name('ckeditor4');

Route::get('ckeditor5-demo', function() {
    return view('ckeditor-demo.ckeditor5-demo');
})->name('ckeditor5');

Route::get('slide-infinite-loop', function() {
    return view('slide-show.slide-infinite-loop');
})->name('slide-infinite-loop');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});












Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';