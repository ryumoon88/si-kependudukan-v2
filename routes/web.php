<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResidentBirthController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceHasRequirementController;
use App\Http\Controllers\ServiceRequirementController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\UserServiceCategoryController;
use App\Http\Controllers\UserServiceController;
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

#region User
Route::group(['as' => 'user.'], function () {
    Route::get('/', [UserHomeController::class, 'index'])->name('index');

    #region Authentication
    Route::group(['as' => 'auth.'], function () {
        Route::group(['middleware' => 'auth'], function () {
            Route::post('/logout', [AuthenticateController::class, 'logout'])->name('logout')->middleware('auth');
        });

        Route::group(['middleware' => 'guest'], function () {
            Route::get('/register', [AuthenticateController::class, 'register'])->name('register');
            Route::post('/register', [AuthenticateController::class, 'validates'])->name('validate');
            Route::post('/register/success', [AuthenticateController::class, 'registered'])->name('registered');
            Route::post('/authenticate', [AuthenticateController::class, 'authenticate'])->name('authenticate');
            Route::get('/login', [AuthenticateController::class, 'login'])->name('login');
        });
    });


    #endregion

    // Route::resource('service-category', UserServiceCategoryController::class)
    //     ->names('service-category')
    //     ->only(['index']);

    Route::resource('service', UserServiceController::class)->names('service')->only(['index']);

    // Route::resource('service', UserServiceController::class)
    //     ->names('service')
    //     ->only(['index']);

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('submission', SubmissionController::class)->names('submission')->only(['create', 'index', 'store']);

        Route::post('uploads', [UploadController::class, 'upload'])->name('upload');
    });
});
Route::get('/berita', function () {
    return view('user.berita.perlu');
})->name('user.berita.index');
#endregion

#region Admin
Route::group(['prefix' => 'a', 'as' => 'admin.', 'middleware' => 'permission:view.admin.dashboard'], function () {
    Route::get('/', [UserController::class, 'index'])->name('index');

    Route::group(['prefix' => 'resident', 'as' => 'resident.'], function () {
        Route::resource('birth', ResidentBirthController::class)
            ->parameter('birth', 'resident-birth')
            ->scoped(['resident_birth' => 'ulid'])
            ->names('birth');

        Route::resource('registered', ResidentController::class)
            ->parameter('registered', 'resident')
            ->scoped(['resident' => 'ulid'])
            ->names('registered');
    });

    Route::group(['prefix' => 'service', 'as' => 'service.'], function () {
        Route::resource('service', ServiceController::class)
            ->scoped(['service' => 'slug']);

        Route::resource('category', ServiceCategoryController::class)
            ->parameter('category', 'service-category')
            ->scoped(['service_category' => 'slug']);

        Route::resource('requirement', ServiceRequirementController::class)
            ->parameter('requirement', 'service_requirement')
            ->scoped(['service_requirement' => 'ulid']);

        Route::resource('service-has-requirement', ServiceHasRequirementController::class);
    });

    Route::group(['prefix' => 'submission', 'as' => 'submission.'], function () {
        Route::get('accept/{submission:ulid}', [SubmissionController::class, 'accept_submission'])->name('accept');
        Route::get('deny/{submission:ulid}', [SubmissionController::class, 'deny_submission'])->name('deny');
    });

    Route::resource('submission', SubmissionController::class)
        ->scoped(['submission' => 'ulid'])
        ->only(['show', 'index']);

    Route::resource('profile', ProfileController::class)
        ->parameter('profile', 'user')
        ->scoped(['user' => 'ulid']);
});
#endregion
