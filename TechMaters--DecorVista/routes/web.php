<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\UserController ;

// User Controller
use App\Http\Controllers\User\WishlistController as UserWishlistController;
use App\Http\Controllers\UserController as FUserController;
use App\Http\Controllers\User\BlogController as UserBlogController;
use App\Http\Controllers\User\CartController as UserCartController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\User\ReviewController as UserReviewController;
use App\Http\Controllers\User\GalleryController as UserGalleryController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;

// Interior Designer Controller
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\User\CheckoutController as UserCheckoutController;
use App\Http\Controllers\User\ContactUsController as UserContactUsController;
use App\Http\Controllers\User\PortfolioController as UserPortfolioController;

//Admin Controller
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Designer\GalleryController as DesignerGalleryController;
use App\Http\Controllers\User\AppointmentController as UserAppointmentController;
use App\Http\Controllers\Designer\GeneralController as DesignerGenerealController;
use App\Http\Controllers\Designer\PortfolioController as DesignerPortfolioController;
use App\Http\Controllers\Designer\AppointmentController as DesignerAppointmentController;
use App\Http\Controllers\Admin\GalleryCategoryController as AdminGalleryCategoryController;
use App\Http\Controllers\Admin\ProductCategoryController as AdminProductCategoryController;
use App\Http\Controllers\Admin\ContactUsController as AdminContactUsController;





/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Remove an item from the cart




Route::controller(AuthController::class)->group(function(){
    Route::post('/register', 'register')->name('auth.register');
    Route::post('login', 'login')->name('auth.login');
    Route::post('/verify-otp','verifyOtp')->name('auth.verifyotp');
    Route::get('/logout','logout')->name('auth.logout');
});


// Admin Routes
Route::prefix('admin')->group(function(){
    Route::controller(AdminDashboardController::class)->group(function(){
        Route::get('/dashboard',  'index')->name('admin.dashboard');
        Route::post('register', 'register');
        Route::get('login', 'login_two')->name('loginForm');
        Route::post('/login-verification', 'login')->name('login.verification');
        Route::post('/verifiedcredintails', 'verifiedcredintails')->name('verifiedcredintails');
        Route::post('/verifyOTP/expire', 'expireotp')->name('expireotp');
        Route::post('/verifyOTP/resend', 'resendOtp')->name('resendotp')->middleware('throttle:5,1');
        Route::get('forgetPasswordForm','forgetPasswordForm')->name('forgetPasswordForm');
        Route::get('verifyOtpform','verifyOtpform')->name('verifyOtpform');
        Route::post('forget_password', 'forgetPassword')->name('forget_password');
        Route::get('/logouts', 'logout')->name('logout');
        Route::get('/resetPasswordForm/{token}','resetPasswordForm')->name('resetPasswordForm');
        Route::post('reset_password', 'resetPassword')->name('reset_password');
    });

    Route::controller(AdminOrderController::class)->group(function () {
        Route::prefix('orders')->group(function () {
            Route::get('/', 'index')->name('admin.orders.index');
            Route::get('/{id}/detail', 'show')->name('admin.orders.detail');
            Route::get('/create', 'create')->name('admin.orders.create');
            Route::post('/store', 'store')->name('admin.orders.store');
            Route::put('/{id}/detail', 'show')->name('admin.orders.show');
            Route::post('/status', 'status')->name('admin.orders.status');
            Route::get('/{id}/edit', 'edit')->name('admin.orders.edit');
            Route::post('/update', 'update')->name('admin.orders.update');
            Route::post('/destroy/{id}', 'destroy')->name('admin.orders.destroy');
        });
    });


Route::middleware(['admin.auth'])->group(function () {

    
    
    Route::controller(AdminGalleryCategoryController::class)->group(function () {
        Route::prefix('gallery-categories')->group(function () {
            Route::get('/', 'index')->name('admin.gallery.categories.index');
            Route::get('/create', 'create')->name('admin.gallery.categories.create');
            Route::post('/store', 'store')->name('admin.gallery.categories.store');
            Route::post('/status', 'status')->name('admin.gallery.categories.status');
            Route::get('/{id}/edit', 'edit')->name('admin.gallery.categories.edit');
            Route::post('/update', 'update')->name('admin.gallery.categories.update');
            
            Route::post('/destroy/{id}', 'destroy')->name('admin.gallery.categories.destroy');
        });
    });
    Route::controller(AdminContactUsController::class)->group(function () {
        Route::prefix('contactus')->group(function () {
            Route::get('/', 'index')->name('admin.contactus.index');
            Route::get('/create', 'create')->name('admin.contactus.create');
            Route::post('/store', 'store')->name('admin.contactus.store');
            Route::post('/status', 'status')->name('admin.contactus.status');
            Route::get('/{id}/edit', 'edit')->name('admin.contactus.edit');
            Route::post('/update', 'update')->name('admin.contactus.update');
            
            Route::post('/destroy/{id}', 'destroy')->name('admin.contactus.destroy');
        });
    });


    Route::controller(AdminProductCategoryController::class)->group(function () {
        Route::prefix('product-categories')->group(function () {
            Route::get('/', 'index')->name('admin.product.categories.index');
            Route::get('/create', 'create')->name('admin.product.categories.create');
            Route::post('/store', 'store')->name('admin.product.categories.store');
            Route::post('/status', 'status')->name('admin.product.categories.status');
            Route::get('/{id}/edit', 'edit')->name('admin.product.categories.edit');
            Route::post('/update', 'update')->name('admin.product.categories.update');
            
            Route::post('/destroy/{id}', 'destroy')->name('admin.product.categories.destroy');
        });
    });



    Route::controller(AdminGalleryController::class)->group(function () {
        Route::prefix('gallery')->group(function () {
            Route::get('/', 'index')->name('gallery.index');
            Route::get('/create', 'create')->name('gallery.create');
            Route::post('/store', 'store')->name('gallery.store');
            Route::post('/status', 'status')->name('gallery.status');
            Route::get('/{id}/edit', 'edit')->name('gallery.edit');
            Route::put('/update', 'update')->name('gallery.update');
            
            Route::post('/destroy/{id}', 'destroy')->name('gallery.destroy');
        });
    });


    Route::controller(AdminBlogController::class)->group(function () {
        Route::prefix('blogs')->group(function () {
            Route::get('/', 'index')->name('admin.blogs.index');
            Route::get('/{id}/detail', 'show')->name('admin.blogs.detail');
            Route::get('/create', 'create')->name('admin.blogs.create');
            Route::post('/store', 'store')->name('admin.blogs.store');
            Route::put('/{id}/detail', 'show')->name('admin.blogs.show');
            Route::post('/status', 'status')->name('admin.blogs.status');
            Route::get('/{id}/edit', 'edit')->name('admin.blogs.edit');
            Route::post('/update', 'update')->name('admin.blogs.update');
            Route::post('/destroy/{id}', 'destroy')->name('admin.blogs.destroy');
        });
    });



    Route::controller(AdminProductController::class)->group(function () {
        Route::prefix('products')->group(function () {
            Route::get('/', 'index')->name('admin.products.index');
            Route::get('/{id}/detail', 'show')->name('admin.products.detail');
            Route::get('/create', 'create')->name('admin.products.create');
            Route::post('/store', 'store')->name('admin.products.store');
            Route::put('/{id}/detail', 'show')->name('admin.products.show');
            Route::post('/status', 'status')->name('admin.products.status');
            Route::get('/{id}/edit', 'edit')->name('admin.products.edit');
            Route::post('/update', 'update')->name('admin.products.update');
            Route::post('/destroy/{id}', 'destroy')->name('admin.products.destroy');
        });
    });

});


});

// User Routes
Route::prefix('frontend')->group(function(){
    Route::middleware(['user.auth'])->group(function () {
        Route::get('/', [AuthController::class, 'showWelcome'])->name('welcome');
        Route::controller(UserReviewController::class)->prefix('review')->group(function () {
            Route::get('/', 'create')->name('users.review.index');
            Route::post('/store', 'store')->name('users.review.store');

            
        });

        Route::controller(UserCheckoutController::class)->prefix('checkout')->group(function () {
            Route::get('/', 'index')->name('users.checkout.index');
            Route::post('/store', 'store')->name('users.checkout.store');
        }); 
    });

    Route::controller(FUserController::class)->group(function(){
        Route::get('/', 'index');
        Route::get('/about', 'about')->name('users.about.index');
        Route::get('/account', 'account')->name('account');
        Route::get('/add-listing', 'addListing')->name('add-listing');
        Route::get('/blog-detail', 'blogDetail')->name('blog-detail');
        Route::get('/blog-grid', 'blogGrid')->name('blog-grid');
        Route::get('/cart', 'cart')->name('cart');
        Route::get('/checkout', 'checkout')->name('checkout');
        Route::get('/contact', 'contact')->name('contact');
        Route::get('/faq', 'faq')->name('faq');
        Route::get('/history', 'history')->name('history');
        Route::get('/location', 'location')->name('location');
        Route::get('/order', 'order')->name('order');
        Route::get('/portfolio', 'portfolio')->name('portfolio');
        Route::get('/portfolio-Detail', 'portfolioDetails')->name('portfolio-Detail');
        Route::get('/product-detail', 'productDetail')->name('product-detail');
        Route::get('/register', 'register')->name('register');
        Route::get('/service-details', 'serviceDetails')->name('service-details');
        Route::get('/service', 'service')->name('service');
        Route::get('/shop', 'shop')->name('shop');
        Route::get('/shop-list', 'shopList')->name('shop-list');
        Route::get('/team', 'team')->name('team');
        Route::get('/team-details', 'teamDetails')->name('team-details');
        Route::get('/wishlist', 'wishlist')->name('wishlist');
    });

    Route::controller(UserController::class)->prefix('users')->group(function () {
        Route::get('/register', 'registerform')->name('users.register');
        Route::get('/login', 'loginform')->name('users.login');
        Route::get('/verify_otp', 'verifyOtpform')->name('users.verifyOtp');
        Route::get('/logouts', 'logout')->name('users.logout');
        Route::get('/' , 'index')->name('home');
        Route::get('/about-us' , 'about')->name('aboutus');
    });

    Route::controller(UserBlogController::class)->prefix('blogs')->group(function () {
        Route::get('/', 'index')->name('users.blogs.index');
        Route::get('/{id}/detail', 'show')->name('users.blogs.show');

    });
    Route::controller(UserPortfolioController::class)->prefix('portfolios')->group(function () {
        Route::get('/', 'index')->name('users.portfolios.index');
        Route::get('/{id}/detail', 'show')->name('users.portfolios.show');

    });


    Route::controller(UserContactUsController::class)->prefix('contact')->group(function () {
        Route::get('/', 'create')->name('users.contact.index');
        Route::post('/store', 'store')->name('users.contact.store');
    });
  

    Route::controller(UserAppointmentController::class)->prefix('appointment')->group(function () {
        Route::get('/', 'create')->name('users.appointments.index');
        Route::post('/store/{id}', 'store')->name('users.appointments.store');
    });

    Route::controller(UserProductController::class)->prefix('products')->group(function () {
        Route::get('/', 'index')->name('users.products.index');
        Route::get('/detail/{id}/', 'show')->name('users.products.show');
    });
    
    Route::controller(UserCheckoutController::class)->prefix('checkout')->group(function () {
        Route::get('/', 'index')->name('users.checkout.index');
        Route::post('/store', 'store')->name('users.checkout.store');
    });
    
    Route::controller(UserCartController::class)->prefix('carts')->group(function () {
        Route::get('/cart2', 'cart2')->name('users.cart.index');
        Route::get('/add-to-cart/{id}',[UserCartController::class,'addtocart']);
        Route::get('/',[UserCartController::class,'showCart']);
        Route::get('/remove-from-cart/{id}',  'removeFromCart')->name('remove.from.cart');
        Route::get('/calculate',  'calculateCart');
    });
    Route::controller(UserWishlistController::class)->prefix('wishlist')->group(function () {

        Route::post('/add/{id}', 'addtowishlist')->name('wishlist.add');
        Route::delete('/remove', 'deletefromwishlist')->name('wishlist.remove');
        

    });





});


//Designer Routes
Route::prefix('designer')->group(function(){
    Route::middleware(['auth', 'role:designer'])->group(function () {
    });


        Route::controller(DesignerPortfolioController::class)->group(function () {
            Route::prefix('portfolio')->group(function () {
                Route::get('/', 'index')->name('designer.portfolio.index');
                Route::get('/create', 'create')->name('designer.portfolio.create');
                Route::post('/store', 'store')->name('designer.portfolio.store');
                Route::post('/status', 'status')->name('designer.portfolio.status');
                Route::get('/{id}/edit', 'edit')->name('designer.portfolio.edit');
                Route::post('/update', 'update')->name('designer.portfolio.update');
                Route::post('/destroy/{id}', 'destroy')->name('designer.portfolio.destroy');
            });
        });
        Route::controller(DesignerGenerealController::class)->group(function () {        
                Route::get('/dashboard', 'index')->name('designer.dashboard.index');
                Route::get('/get-categories', 'gallerycategories');
                Route::get('/register', 'register')->name('designer.register');
                Route::get('/login', 'login')->name('designer.login');
                Route::get('/verify-otp', 'verifyOTP')->name('designer.verify-otp');
                Route::get('/{id}/edit', 'edit')->name('designer.dashboard.edit');
                Route::post('/update', 'update')->name('designer.dashboard.update');
                Route::post('/destroy/{id}', 'destroy')->name('designer.dashboard.destroy');
        });
        Route::controller(DesignerAppointmentController::class)->group(function () {
            Route::prefix('appointmets')->group(function () {            
            Route::get('/', 'index')->name('designer.appointments.index');
            Route::patch('designer/appointments/{id}', 'updateStatus')->name('designer.appointments.updateStatus');
            Route::get('/create', 'create')->name('designer.appointmets.create');
            Route::post('/store', 'store')->name('designer.appointmets.store');
            Route::post('/status', 'status')->name('designer.appointments.status');
            Route::get('/{id}/edit', 'edit')->name('designer.appointmets.edit');
            Route::post('/update', 'update')->name('designer.appointmets.update');
            Route::post('/destroy/{id}', 'destroy')->name('designer.appointments.destroy');
        });
        });
        Route::controller(DesignerGalleryController::class)->group(function () {
            Route::prefix('gallery')->group(function () {            
            Route::get('/', 'index')->name('designer.gallery.index');
            Route::get('/create', 'create')->name('designer.gallery.create');
            Route::post('/store', 'store')->name('designer.gallery.store');
            Route::post('/status', 'status')->name('designer.gallery.status');
            Route::get('/{id}/edit', 'edit')->name('designer.gallery.edit');
            Route::post('/update', 'update')->name('designer.gallery.update');
            Route::post('/destroy/{id}', 'destroy')->name('designer.gallery.destroy');
        });
        });
    });


    








route::get('/gallery' , [UserGalleryController::class , 'index'])->name('users.gallery.index');;

