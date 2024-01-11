<?php



use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// trang chủ ở đây
Route::fallback(function () {
    return redirect('/')->with('error', "Bạn đã nhập sai đường dẫn");
});

Route::group(['prefix' => '/'], function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/','index')->name('home');
        Route::get('/chatbox','chatbox');
    });
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login','showLoginForm')->name('login');
        Route::post('/login','login')->name('login');
        Route::get('/logout', 'logout')->name('logout');

        Route::get('/register', 'showRegistrationForm')->name('register');
        Route::post('/register', 'register');

        Route::get('/shared/{token}','updateShare')->name('registerShareGet');
        Route::post('/register/{id}', 'registerShare')->name('registerShare');

        Route::get('/mang-xa-hoi/dang-nhap','redirectToGoogle')->name('loginMail');
        Route::get('/mang-xa-hoi/dang-nhap/callback','handleGoogleCallback');
        Route::post('/updatePassword', 'updatePassword')->name('updatePassword');

        Route::get('forgot-password', 'showLinkRequestForm')->name('password.request');
        Route::post('forgot-password', 'sendResetLinkEmail')->name('password.email');
        Route::get('reset-password/{id_user}', 'showResetForm')->name('password.reset');
        Route::post('reset-password', 'reset')->name('password.update');

    });

    Route::middleware(['CheckLoginUser'])->group(function () {

        Route::controller(MessagesController::class)->group(function () {
            Route::post('/sendMessage','index');
            Route::get('/listChat','getChat');
            Route::get('/listChatAdmin/{id}','getChatAdmin');
            Route::post('/sendMessageAdmin','sendMessageAdmin');
        });
        Route::controller(UserInfoController::class)->group(function () {
            Route::get('/danh-sach-nguoi-gioi-thieu','listGT')->name('listGT');
            Route::get('/thong-tin-ca-nhan','create')->name('updateInfo');
            Route::post('/thong-tin-ca-nhan','createPost')->name('updateInfoPost');

        });
    });

});
Route::group(['prefix' => 'admin', 'middleware'=>['CheckAdmin', 'CheckLoginUser']], function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/','index')->name('admin');
        Route::get('/huong-dan-su-dung','docs')->name('docs');
    });
    Route::group(['prefix' => 'chat', 'as' =>'chat.'], function () {
        Route::controller(MessagesController::class)->group(function () {
            Route::get('/','indexAdmin')->name('index');
            Route::get('/getUser','getUser');
            Route::put('/updateRead','updateReadMessage');
            Route::get('/getUserSearch','searchUser');
        });
    });
    Route::group(['prefix' => 'user', 'as' =>'user.'], function () {
        Route::controller(UserController::class)->group(function () {
            // danh sách
            Route::get('/','index')->name('index');
            Route::get('/list/{type}','list')->name('list');
            // thêm
            Route::get('/add', 'create')->name('add');
            Route::post('/add', 'store')->name('addPost');

            //sửa
            Route::get('edit/{id}','edit')->name('edit');
            Route::post('edit/{id}','update')->name('editPost');
            // xóa
            Route::get('/delete/{id}', 'destroy')->name('delete');

            // hiển thị tất cả
            Route::get('/show/{id}', 'show')->name('show');

        });
    });

    Route::group(['prefix' => 'category', 'as' =>'category.'], function () {
        Route::controller(CategoryController::class)->group(function () {
            // danh sách
            Route::get('/','index')->name('index');

            // thêm
            Route::get('/add', 'create')->name('add');
            Route::post('/add', 'store')->name('addPost');

            //sửa
            Route::get('edit/{id}','edit')->name('edit');
            Route::post('edit/{id}','update')->name('editPost');
            // xóa
            Route::get('/delete/{id}', 'destroy')->name('delete');

            // hiển thị tất cả
            Route::get('/show/{id}', 'show')->name('show');
        });
    });

    Route::group(['prefix' => 'post', 'as' =>'post.'], function () {
        Route::controller(PostController::class)->group(function () {
            // danh sách
            Route::get('/','index')->name('index');

            // thêm
            Route::get('/add', 'create')->name('add');
            Route::post('/add', 'store')->name('addPost');

            //sửa
            Route::get('edit/{id}','edit')->name('edit');
            Route::post('edit/{id}','update')->name('editPost');
            // xóa
            Route::get('/delete/{id}', 'destroy')->name('delete');

        });
    });
    Route::group(['prefix' => 'social', 'as' =>'social.'], function () {
        Route::controller(SocialController::class)->group(function () {
            // danh sách
            Route::get('/','index')->name('index');

            // thêm
            Route::get('/add', 'create')->name('add');
            Route::post('/add', 'store')->name('addSocial');

            //sửa
            Route::get('edit/{id}','edit')->name('edit');
            Route::post('edit/{id}','update')->name('editSocial');
            // xóa
            Route::get('/delete/{id}', 'destroy')->name('delete');

        });
    });
});

