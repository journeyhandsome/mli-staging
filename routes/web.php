<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BppeReportController;
use App\Http\Controllers\HealthFormController;
use App\Http\Controllers\TfWestwoodController;
use App\Http\Controllers\UploadFileController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TfHollywoodController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PreEnrollmentController;
use App\Http\Controllers\SurvivalGuideController;
use App\Http\Controllers\StudentCatalogController;
use App\Http\Controllers\ApplicationFileController;
use App\Http\Controllers\AnnouncementFileController;
use App\Http\Controllers\PerformanceSheetController;
use App\Http\Controllers\OnlineApplicationController;
use App\Http\Controllers\CosController;

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

Auth::routes();

Route::get('/', function() {
    return redirect()->route('login');
});
Route::get('test',[OnlineApplicationController::class,'test']);
Route::get('/change-of-status', [CosController::class, 'index']);
Route::redirect('/cos', '/change-of-status', 301);

//Dynamic Data for homepage
    Route::get('/get_home_info/{lang}', 'App\Http\Controllers\HomepageController@getHomeInfo');
    Route::get('/testimonial/{slug}/{testimonial}', [TestimonialController::class, 'showTestimonialPerNationality']);
    Route::get('/get_routes', 'App\Http\Controllers\GenerateRouteController@index');

//Register/Login
    Route::get('auth/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('auth/register', [RegisterController::class, 'register']);
    Route::get('auth/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('auth/login', [LoginController::class, 'login']);
    Route::post('auth/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('pending',[UserController::class, 'pending'])->name('pending');
    
Route::group(['middleware'=>['AuthCheck']], function(){ 

    //UserManagement
    Route::get('admin/users',[UserController::class, 'index'])->name('users.index');
    Route::get('admin/users/approve',[UserController::class, 'approve'])->name('users.approve');
    Route::get('admin/users/approval/{id}',[UserController::class, 'approval'])->name('users.approval');
    Route::put('admin/users/accept/{id}',[UserController::class, 'accept'])->name('users.accept');
    Route::get('admin/users/create',[UserController::class, 'create'])->name('users.create');
    Route::post('admin/users/create',[UserController::class, 'store'])->name('users.store');
    Route::get('admin/users/edit/{id}',[UserController::class, 'edit'])->name('users.edit');
    Route::put('admin/users/update/{id}',[UserController::class, 'update'])->name('users.update');
    Route::delete('admin/users/destroy/{id}',[UserController::class, 'destroy'])->name('users.destroy');

    //Slider Management  
    Route::get('admin/slider',[SliderController::class, 'index'])->name('slider.index');
    Route::get('admin/slider/create',[SliderController::class, 'create'])->name('slider.create');
    Route::post('admin/slider/create',[SliderController::class, 'store'])->name('slider.store');
    Route::get('admin/slider/get_sliders',[SliderController::class, 'getsliders']);
    Route::post('admin/slider/reorder',[SliderController::class, 'sliderOrder']);
    Route::get('admin/slider/show/{id}',[SliderController::class, 'show']);
    Route::get('admin/slider/edit/{id}',[SliderController::class, 'edit'])->name('slider.edit');
    Route::put('admin/slider/update/{id}',[SliderController::class, 'update'])->name('slider.update');
    Route::delete('admin/slider/destroy/{id}',[SliderController::class, 'destroy'])->name('slider.destroy');
    Route::delete('admin/slider/reorder/{id}',[SliderController::class, 'reorder'])->name('slider.reorder');
    

    //Banner Management  
    Route::get('admin/banner',[BannerController::class, 'index'])->name('banner.index');
    Route::get('admin/banner/create',[BannerController::class, 'create'])->name('banner.create');
    Route::post('admin/banner/create',[BannerController::class, 'store'])->name('banner.store');
    Route::get('admin/banner/show/{id}',[BannerController::class, 'show']);
    Route::get('admin/banner/edit/{id}',[BannerController::class, 'edit'])->name('banner.edit');
    Route::put('admin/banner/update/{id}',[BannerController::class, 'update'])->name('banner.update');
    Route::delete('admin/banner/destroy/{id}',[BannerController::class, 'destroy'])->name('banner.destroy');

    //AnnouncementManagement
    Route::get('admin/announcement',[AnnouncementController::class, 'index'])->name('announcement.index');
    Route::get('admin/announcement/create',[AnnouncementController::class, 'create']);
    Route::post('admin/announcement/create',[AnnouncementController::class, 'store']);


    //NationalityCampus      
    Route::resource('nationality','App\Http\Controllers\NationalityController');
    Route::resource('campus','App\Http\Controllers\CampusController');
    Route::resource('language','App\Http\Controllers\LanguageController');

    //TestimonialManagement       
    Route::get('admin/testimonial',[TestimonialController::class, 'index'])->name('testimonial.index');
    Route::get('admin/testimonial/create',[TestimonialController::class, 'create'])->name('testimonial.create');
    Route::post('admin/testimonial/create',[TestimonialController::class, 'store'])->name('testimonial.store');
    Route::post('admin/testimonial/save_translation',[TestimonialController::class, 'saveTranslation']);
    Route::post('admin/testimonial/remove_translation',[TestimonialController::class, 'removeTranslation']);
    Route::get('admin/testimonial/show/{id}',[TestimonialController::class, 'show'])->name('testimonial.show');
    Route::get('admin/testimonial/get_testimonial',[TestimonialController::class, 'getTestimonial']);
    Route::get('admin/testimonial/edit/{id}',[TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::post('admin/testimonial/update/{id}',[TestimonialController::class, 'update'])->name('testimonial.update');
    Route::delete('admin/testimonial/destroy/{id}',[TestimonialController::class, 'destroy'])->name('testimonial.destroy');

    // Route::post('health-form', [HealthFormController::class, 'store']);

    
    //Forms - upload Files
    Route::get('admin/forms',[UploadFileController::class, 'index'])->name('forms.index');
        //Announcement Files
        Route::get('admin/forms/announcement_file',[AnnouncementFileController::class, 'index'])->name('announcement_file.index');
        Route::get('admin/forms/announcement_file/upload_file',[AnnouncementFileController::class, 'create'])->name('announcement_file.create');
        Route::post('admin/forms/announcement_file/upload_file',[AnnouncementFileController::class, 'store'])->name('announcement_file.store');
        Route::get('admin/forms/announcement_file/edit/{id}',[AnnouncementFileController::class, 'edit'])->name('announcement_file.edit');
        Route::put('admin/forms/announcement_file/update/{id}',[AnnouncementFileController::class, 'update'])->name('announcement_file.update');
        Route::delete('admin/forms/announcement_file/destroy/{id}',[AnnouncementFileController::class, 'destroy'])->name('announcement_file.destroy');
        //Pre Enrolment Files
        Route::get('admin/forms/pre-enrollment',[PreEnrollmentController::class, 'index'])->name('pre_enrollment.index');
        Route::get('admin/forms/pre-enrollment/upload_file',[PreEnrollmentController::class, 'create'])->name('pre_enrollment.create');
        Route::post('admin/forms/pre-enrollment/upload_file',[PreEnrollmentController::class, 'store'])->name('pre_enrollment.store');
        Route::get('admin/forms/pre-enrollment/edit/{id}',[PreEnrollmentController::class, 'edit'])->name('pre_enrollment.edit');
        Route::put('admin/forms/pre-enrollment/update/{id}',[PreEnrollmentController::class, 'update'])->name('pre_enrollment.update');
        Route::delete('admin/forms/pre-enrollment/destroy/{id}',[PreEnrollmentController::class, 'destroy'])->name('pre_enrollment.destroy');
        //Enrollment and Application Files
        Route::get('admin/forms/application',[ApplicationFileController::class, 'index'])->name('application.index');
        Route::get('admin/forms/application/upload_file',[ApplicationFileController::class, 'create'])->name('application.create');
        Route::post('admin/forms/application/upload_file',[ApplicationFileController::class, 'store'])->name('application.store');
        Route::get('admin/forms/application/edit/{id}',[ApplicationFileController::class, 'edit'])->name('application.edit');
        Route::put('admin/forms/application/update/{id}',[ApplicationFileController::class, 'update'])->name('application.update');
        Route::delete('admin/forms/application/destroy/{id}',[ApplicationFileController::class, 'destroy'])->name('application.destroy');
        //Student Catalog Files
        Route::get('admin/forms/student_catalog',[StudentCatalogController::class, 'index'])->name('student_catalog.index');
        Route::get('admin/forms/student_catalog/upload_file',[StudentCatalogController::class, 'create'])->name('student_catalog.create');
        Route::post('admin/forms/student_catalog/upload_file',[StudentCatalogController::class, 'store'])->name('student_catalog.store');
        Route::get('admin/forms/student_catalog/edit/{id}',[StudentCatalogController::class, 'edit'])->name('student_catalog.edit');
        Route::put('admin/forms/student_catalog/update/{id}',[StudentCatalogController::class, 'update'])->name('student_catalog.update');
        Route::delete('admin/forms/student_catalog/destroy/{id}',[StudentCatalogController::class, 'destroy'])->name('student_catalog.destroy');
        //Performance fact Sheet Files
        Route::get('admin/forms/performance_fact_sheet',[PerformanceSheetController::class, 'index'])->name('performance_fact_sheet.index');
        Route::get('admin/forms/performance_fact_sheet/upload_file',[PerformanceSheetController::class, 'create'])->name('performance_fact_sheet.create');
        Route::post('admin/forms/performance_fact_sheet/upload_file',[PerformanceSheetController::class, 'store'])->name('performance_fact_sheet.store');
        Route::get('admin/forms/performance_fact_sheet/edit/{id}',[PerformanceSheetController::class, 'edit'])->name('performance_fact_sheet.edit');
        Route::put('admin/forms/performance_fact_sheet/update/{id}',[PerformanceSheetController::class, 'update'])->name('performance_fact_sheet.update');
        Route::delete('admin/forms/performance_fact_sheet/destroy/{id}',[PerformanceSheetController::class, 'destroy'])->name('performance_fact_sheet.destroy');
        //BPPE Annual Report Files
        Route::get('admin/forms/bppe_annual_report',[BppeReportController::class, 'index'])->name('bppe_annual_report.index');
        Route::get('admin/forms/bppe_annual_report/upload_file',[BppeReportController::class, 'create'])->name('bppe_annual_report.create');
        Route::post('admin/forms/bppe_annual_report/upload_file',[BppeReportController::class, 'store'])->name('bppe_annual_report.store');
        Route::get('admin/forms/bppe_annual_report/edit/{id}',[BppeReportController::class, 'edit'])->name('bppe_annual_report.edit');
        Route::put('admin/forms/bppe_annual_report/update/{id}',[BppeReportController::class, 'update'])->name('bppe_annual_report.update');
        Route::delete('admin/forms/bppe_annual_report/destroy/{id}',[BppeReportController::class, 'destroy'])->name('bppe_annual_report.destroy');
        //TF Westwood Files
        Route::get('admin/forms/tf_westwood',[TfWestwoodController::class, 'index'])->name('tf_westwood.index');
        Route::get('admin/forms/tf_westwood/upload_file',[TfWestwoodController::class, 'create'])->name('tf_westwood.create');
        Route::post('admin/forms/tf_westwood/upload_file',[TfWestwoodController::class, 'store'])->name('tf_westwood.store');
        Route::get('admin/forms/tf_westwood/edit/{id}',[TfWestwoodController::class, 'edit'])->name('tf_westwood.edit');
        Route::put('admin/forms/tf_westwood/update/{id}',[TfWestwoodController::class, 'update'])->name('tf_westwood.update');
        Route::delete('admin/forms/tf_westwood/destroy/{id}',[TfWestwoodController::class, 'destroy'])->name('tf_westwood.destroy');
        //TF Hollywood Files
        Route::get('admin/forms/tf_hollywood',[TfHollywoodController::class, 'index'])->name('tf_hollywood.index');
        Route::get('admin/forms/tf_hollywood/upload_file',[TfHollywoodController::class, 'create'])->name('tf_hollywood.create');
        Route::post('admin/forms/tf_hollywood/upload_file',[TfHollywoodController::class, 'store'])->name('tf_hollywood.store');
        Route::get('admin/forms/tf_hollywood/edit/{id}',[TfHollywoodController::class, 'edit'])->name('tf_hollywood.edit');
        Route::put('admin/forms/tf_hollywood/update/{id}',[TfHollywoodController::class, 'update'])->name('tf_hollywood.update');
        Route::delete('admin/forms/tf_hollywood/destroy/{id}',[TfHollywoodController::class, 'destroy'])->name('tf_hollywood.destroy');
        //Survival Guide
        Route::get('admin/forms/survival_guide',[SurvivalGuideController::class, 'index'])->name('survival_guide.index');
        Route::get('admin/forms/survival_guide/upload_file',[SurvivalGuideController::class, 'create'])->name('survival_guide.create');
        Route::post('admin/forms/survival_guide/upload_file',[SurvivalGuideController::class, 'store'])->name('survival_guide.store');
        Route::get('admin/forms/survival_guide/edit/{id}',[SurvivalGuideController::class, 'edit'])->name('survival_guide.edit');
        Route::put('admin/forms/survival_guide/update/{id}',[SurvivalGuideController::class, 'update'])->name('survival_guide.update');
        Route::delete('admin/forms/survival_guide/destroy/{id}',[SurvivalGuideController::class, 'destroy'])->name('survival_guide.destroy');

});