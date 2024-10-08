<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\InquiryController;
use App\Http\Controllers\InquiryfrontController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\VideoController;
use App\Http\Controllers\admin\BlogcategoryController;



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


// frontend rout start

// Route::get('/', 'PagesController@home')->name('front-home');
// Route::get('/home', 'PagesController@home')->name('front-home');
// Route::get('/compnay', 'PagesController@company')->name('front-company');
// Route::get('/team', 'PagesController@team')->name('front-team');
// Route::get('/work', 'PagesController@work')->name('front-work');
// Route::get('/work/{slug}', 'PagesController@work_detail')->name('front-work-detail');
// Route::get('/service', 'PagesController@service')->name('front-service');
// Route::get('/service/{slug}', 'PagesController@service_detail')->name('front-service-detail');
// Route::get('/blog', 'PagesController@blog')->name('front-blog');
// Route::get('/blog/{slug}', 'PagesController@blog_detail')->name('front-blog-detail');
// Route::get('/career', 'PagesController@career')->name('front-career');
// Route::get('/contact', 'PagesController@contact')->name('front-contact');
// Route::get('/privacy', 'PagesController@privacy')->name('front-privacy');
// Route::get('/terms', 'PagesController@terms')->name('front-terms');
// Route::post('/contact/store', 'InquiryfrontController@contact_store')->name('front-contact-store');
// Route::post('/career/store', 'InquiryfrontController@career_store')->name('front-career-store');

// frontend rout end





// admin route start



Route::get('/', function () { return redirect()->route('login'); });

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('login', [LoginController::class, 'login']);

Route::get('register', function () { return view('pages.register'); });

Route::post('register', [RegisterController::class, 'register']);



Route::get('password/forget',  function () { return view('pages.forgot-password'); })->name('password.forget');

Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');





Route::group(['middleware' => 'auth'], function () {

    // logout route

    Route::get('logout', [LoginController::class, 'logout'])->name('admin-logout');

    Route::get('clear-cache', [HomeController::class, 'clearCache'])->name('admin-clear-cache');



    // dashboard route  

    Route::get('dashboard', function () { return view('pages.dashboard'); })->name('dashboard');



    Route::get('home/list',                          [BannerController::class, 'list'])->name('home-banner-list');

    Route::get('home/add',                               [BannerController::class, 'add'])->name('home-banner-add');

    Route::get('home/edit/{id}',                         [BannerController::class, 'edit'])->name('home-banner-edit');

    Route::post('home/store',                            [BannerController::class, 'store'])->name('home-banner-store');

    Route::get('home/delete/{id}',                       [BannerController::class, 'delete'])->name('home-banner-delete');





    // Route::get('testimonial/list',                        [TestimonialController::class, 'list'])->name('testimonial-list');

    // Route::get('testimonial/add',                     [TestimonialController::class, 'add'])->name('testimonial-add');

    // Route::get('testimonial/edit/{id}',                   [TestimonialController::class, 'edit'])->name('testimonial-edit');

    // Route::post('testimonial/store',                  [TestimonialController::class, 'store'])->name('testimonial-store');

    // Route::get('testimonial/delete/{id}',                 [TestimonialController::class, 'delete'])->name('testimonial-delete');





    // Route::get('portfolio/category/list',                 [PortfolioCategoryController::class, 'list'])->name('port-cat-list');

    // Route::get('portfolio/category/add',              [PortfolioCategoryController::class, 'add'])->name('port-cat-add');

    // Route::get('portfolio/category/edit/{id}',            [PortfolioCategoryController::class, 'edit'])->name('port-cat-edit');

    // Route::post('portfolio/category/store',           [PortfolioCategoryController::class, 'store'])->name('port-cat-store');

    // Route::get('portfolio/category/delete/{id}',      [PortfolioCategoryController::class, 'delete'])->name('port-cat-delete');





    // Route::get('portfolio/list',                      [PortfolioController::class, 'list'])->name('port-list');

    // Route::get('portfolio/add',                           [PortfolioController::class, 'add'])->name('port-add');

    // Route::get('portfolio/edit/{id}',                     [PortfolioController::class, 'edit'])->name('port-edit');

    // Route::post('portfolio/store',                        [PortfolioController::class, 'store'])->name('port-store');

    // Route::get('portfolio/delete/{id}',                   [PortfolioController::class, 'delete'])->name('port-delete');





    // Route::get('portfolio/detail/list',                   [PortfolioDetailController::class, 'list'])->name('port-detail-list');

    // Route::get('portfolio/detail/add',                    [PortfolioDetailController::class, 'add'])->name('port-detail-add');

    // Route::get('portfolio/detail/edit/{id}',          [PortfolioDetailController::class, 'edit'])->name('port-detail-edit');

    // Route::post('portfolio/detail/store',                 [PortfolioDetailController::class, 'store'])->name('port-detail-store');

    // Route::get('portfolio/detail/delete/{id}',            [PortfolioDetailController::class, 'delete'])->name('port-detail-delete');



    Route::get('inquiry/contact/list',                   [InquiryController::class, 'contact_list'])->name('contact-list');

    Route::get('inquiry/contact/delete/{id}',            [InquiryController::class, 'contact_delete'])->name('contact-delete');




    Route::get('inquiry/career/list',                    [InquiryController::class, 'career_list'])->name('career-list');

    Route::get('inquiry/career/delete/{id}',             [InquiryController::class, 'career_delete'])->name('career-delete');




    // Route::get('about/list',                          [AboutController::class, 'list'])->name('about-list');

    // Route::get('about/add',                               [AboutController::class, 'add'])->name('about-add');

    // Route::get('about/edit/{id}',                         [AboutController::class, 'edit'])->name('about-edit');

    // Route::post('about/store',                            [AboutController::class, 'store'])->name('about-store');

    // Route::get('about/delete/{id}',                       [AboutController::class, 'delete'])->name('about-delete');





    // Route::get('position/list',                           [PositionController::class, 'list'])->name('position-list');

    // Route::get('position/add',                                [PositionController::class, 'add'])->name('position-add');

    // Route::get('position/edit/{id}',                      [PositionController::class, 'edit'])->name('position-edit');

    // Route::post('position/store',                             [PositionController::class, 'store'])->name('position-store');

    // Route::get('position/delete/{id}',                        [PositionController::class, 'delete'])->name('position-delete');





    // Route::get('service/list',                            [ServiceController::class, 'list'])->name('service-list');

    // Route::get('service/add',                         [ServiceController::class, 'add'])->name('service-add');

    // Route::get('service/edit/{id}',                   [ServiceController::class, 'edit'])->name('service-edit');

    // Route::post('service/store',                      [ServiceController::class, 'store'])->name('service-store');

    // Route::get('service/delete/{id}',                 [ServiceController::class, 'delete'])->name('service-delete');





    // Route::get('service/detail/list',                 [ServiceDetailController::class, 'list'])->name('service-detail-list');

    // Route::get('service/detail/add',                  [ServiceDetailController::class, 'add'])->name('service-detail-add');

    // Route::get('service/detail/edit/{id}',                [ServiceDetailController::class, 'edit'])->name('service-detail-edit');

    // Route::post('service/detail/store',               [ServiceDetailController::class, 'store'])->name('service-detail-store');

    // Route::get('service/detail/delete/{id}',          [ServiceDetailController::class, 'delete'])->name('service-detail-delete');


    Route::get('video/list',                 [VideoController::class, 'list'])->name('video-list');
    Route::get('video/add',                  [VideoController::class, 'add'])->name('video-add');
    Route::get('video/edit/{id}',            [VideoController::class, 'edit'])->name('video-edit');
    Route::post('video/store',               [VideoController::class, 'store'])->name('video-store');
    Route::get('video/delete/{id}',          [VideoController::class, 'delete'])->name('video-delete');

    Route::get('blog/list',                  [BlogController::class, 'list'])->name('blog-list');
    Route::get('blog/add',                   [BlogController::class, 'add'])->name('blog-add');
    Route::get('blog/edit/{id}',             [BlogController::class, 'edit'])->name('blog-edit');
    Route::post('blog/store',                [BlogController::class, 'store'])->name('blog-store');
    Route::get('blog/delete/{id}',           [BlogController::class, 'delete'])->name('blog-delete');

    Route::get('blogcategory/list',          [BlogcategoryController::class, 'list'])->name('blog-cat-list');
    Route::get('blogcategory/add',           [BlogcategoryController::class, 'add'])->name('blog-cat-add');
    Route::get('blogcategory/edit/{id}',     [BlogcategoryController::class, 'edit'])->name('blog-cat-edit');
    Route::post('blogcategory/store',        [BlogcategoryController::class, 'store'])->name('blog-cat-store');
    Route::get('blogcategory/delete/{id}',   [BlogcategoryController::class, 'delete'])->name('blog-cat-delete');

    Route::get('comment/list', [BlogController::class, 'commentList'])->name('comment-list');
    Route::post('comment/action/ajax', [BlogController::class, 'commentActionAjax'])->name('comment-action-ajax');
    Route::post('comment/store/ajax', [BlogController::class, 'commentStoreAjax'])->name('comment-store-ajax');
    Route::get('comment/delete/{id}', [BlogController::class, 'commentDelete'])->name('comment-delete');


    // Route::get('team/list',                   [TeamController::class, 'list'])->name('team-list');

    // Route::get('team/add',                    [TeamController::class, 'add'])->name('team-add');

    // Route::get('team/edit/{id}',              [TeamController::class, 'edit'])->name('team-edit');

    // Route::post('team/store',                 [TeamController::class, 'store'])->name('team-store');

    // Route::get('team/delete/{id}',            [TeamController::class, 'delete'])->name('team-delete');


    /*Route::get('productcategory/list',                    [ProductCategoryController::class, 'list'])->name('cat-list');

    Route::get('productcategory/add',                   [ProductCategoryController::class, 'add'])->name('cat-add');

    Route::get('productcategory/edit/{id}',             [ProductCategoryController::class, 'edit'])->name('cat-edit');

    Route::post('productcategory/store',                [ProductCategoryController::class, 'store'])->name('cat-store');

    Route::get('productcategory/delete/{id}',           [ProductCategoryController::class, 'delete'])->name('cat-delete');





    Route::get('product/list',                          [ProductController::class, 'list'])->name('product-list');

    Route::get('product/add',                           [ProductController::class, 'add'])->name('product-add');

    Route::get('product/edit/{id}',                     [ProductController::class, 'edit'])->name('product-edit');

    Route::post('product/store',                        [ProductController::class, 'store'])->name('product-store');

    Route::get('product/delete/{id}',                   [ProductController::class, 'delete'])->name('product-delete');





    Route::get('productdetails/list',                   [ProductDetailController::class, 'list'])->name('details-list');

    Route::get('productdetails/add',                    [ProductDetailController::class, 'add'])->name('details-add');

    Route::get('productdetails/edit/{id}',              [ProductDetailController::class, 'edit'])->name('details-edit');

    Route::post('productdetails/store',                 [ProductDetailController::class, 'store'])->name('details-store');

    Route::get('productdetails/delete/{id}',            [ProductDetailController::class, 'delete'])->name('details-delete');*/







    //only those have manage_user permission will get access

    Route::group(['middleware' => 'can:manage_user'], function () {

        Route::get('/users', [UserController::class, 'index']);

        Route::get('/user/get-list', [UserController::class, 'getUserList']);

        Route::get('/user/create', [UserController::class, 'create']);

        Route::post('/user/create', [UserController::class, 'store'])->name('create-user');

        Route::get('/user/{id}', [UserController::class, 'edit']);

        Route::post('/user/update', [UserController::class, 'update']);

        Route::get('/user/delete/{id}', [UserController::class, 'delete']);

    });



    //only those have manage_role permission will get access

    Route::group(['middleware' => 'can:manage_role|manage_user'], function () {

        Route::get('/roles', [RolesController::class, 'index']);

        Route::get('/role/get-list', [RolesController::class, 'getRoleList']);

        Route::post('/role/create', [RolesController::class, 'create']);

        Route::get('/role/edit/{id}', [RolesController::class, 'edit']);

        Route::post('/role/update', [RolesController::class, 'update']);

        Route::get('/role/delete/{id}', [RolesController::class, 'delete']);

    });





    //only those have manage_permission permission will get access

    Route::group(['middleware' => 'can:manage_permission|manage_user'], function () {

        Route::get('/permission', [PermissionController::class, 'index']);

        Route::get('/permission/get-list', [PermissionController::class, 'getPermissionList']);

        Route::post('/permission/create', [PermissionController::class, 'create']);

        Route::get('/permission/update', [PermissionController::class, 'update']);

        Route::get('/permission/delete/{id}', [PermissionController::class, 'delete']);

    });



    // get permissions

    Route::get('get-role-permissions-badge', [PermissionController::class, 'getPermissionBadgeByRole']);





    // permission examples

    Route::get('/permission-example', function () {

        return view('permission-example');

    });

    // API Documentation

    Route::get('/rest-api', function () {

        return view('api');

    });

});



// admin rout end


