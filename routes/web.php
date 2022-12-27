<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\ResidentBirthController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceHasRequirementController;
use App\Http\Controllers\ServiceRequirementController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\UserController;
use App\Models\Submission;
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
Route::get('/', function () {
    return view('user.index');
})->name('user.index');
Route::get('/login', [AuthenticateController::class, 'login'])->name('user.auth.login');
Route::post('/authenticate', [AuthenticateController::class, 'authenticate'])->name('user.auth.authenticate');
Route::post('/logout', [AuthenticateController::class, 'logout'])->name('user.auth.logout');
Route::get('/register', [AuthenticateController::class, 'register'])->name('user.auth.register');
Route::post('/register', [AuthenticateController::class, 'validates'])->name('user.auth.validate');
Route::post('/register/success', [AuthenticateController::class, 'registered'])->name('user.auth.registered');
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
            ->parameter('requirement', 'service_requirement');

        Route::resource('service-has-requirement', ServiceHasRequirementController::class);
    });
});
#endregion