<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ChangePass;
use App\Models\User;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    $brands = DB::table('brands')->get(); //query builder
    $abouts = DB::table('home_abouts')->first(); //query builder to get first data alone
    return view('home', compact('brands', 'abouts'));
});

Route::get('/home', function () {
    echo "This is the home page";
});

// Route::get('about', function () {
//     return view("about");
// })->middleware("check");

Route::get('/about', function () {
    return view("about");
});

// Route::get('/contact', [ContactController::class, 'index'])->name('con');
Route::get('/contact-ashsjd-sdrtrt-trrsdsdd-sd-ffgesd-sddsdds', [ContactController::class, 'index'])->name('con');

Route::get('settings', [SettingsController::class, 'index']);

Route::get('sitemap', function(){
    echo "this is the site map";
});


//ELOQUENT ORM
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     $users = User::all();
//     // return view('dashboard');
//     //pass the data from the users table in the database
//     return view('dashboard', compact('users'));
// })->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = DB::table('users')->get();
    return view('admin.index', compact('users'));
})->name('dashboard');

//category controller
Route::get('/category/all', [CategoryController::class, 'Allcat'])->name('all.category');

//add category
Route::post('/category/add', [CategoryController::class, 'Addcat'])->name('store.category');

//edit 
Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);

//update
Route::post('/category/update/{id}', [CategoryController::class, 'Update']);

//soft delete
Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);

//restore
Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);

//parmanent delete
Route::get('/pdelete/category/{id}', [CategoryController::class, 'Pdelete']);

//Brand controller
Route::get('/brand/all', [BrandController::class, 'Allbrand'])->name('all.brand');

//add brand and image
Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');

//brand edit 
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);

//update brand
Route::post('/brand/update/{id}', [BrandController::class, 'Update']);

//brand delete
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);


//Brand controller
Route::get('/multi/image', [BrandController::class, 'Multipic'])->name('multi.image');


//add brand and image
Route::post('/multi/add', [BrandController::class, 'StoreImg'])->name('store.image');

//verify email  route
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

//Brand controller
Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');



//admin route
Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('home.slider');

Route::get('/add/slider', [HomeController::class, 'AddSlider'])->name('add.slider');

Route::post('/store/slider', [HomeController::class, 'StoreSlider'])->name('store.slider');


// hOME ABOUT ROUTES
Route::get('/home/about', [AboutController::class, 'HomeAbout'])->name('home.about');

Route::get('/add/about', [AboutController::class, 'AddAbout'])->name('add.about');

Route::post('/store/about', [AboutController::class, 'StoreAbout'])->name('store.about');


// portfolio page route
Route::get('/portfolio', [AboutController::class, 'Portfolio'])->name('portfolio');



// Route::get('/contact', [ContactController::class, 'index'])->name('con');
Route::get('/user/password', [ChangePass::class, 'CPassword'])->name('change.password');

Route::post('/password/update', [ChangePass::class, 'UpdatePassword'])->name('password.update');

Route::get('/profile/update', [ChangePass::class, 'PUpdate'])->name('profile.update');


Route::post('/user/profile/update', [ChangePass::class, 'UpdateProfile'])->name('update.user.profile');
