<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherGuideController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\frontendController;

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
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [OtherController::class, 'dashboard'])->name('dashboard');

    Route::resource('academic',AcademicYearController::class);
    Route::resource('grade',GradeController::class);
    Route::resource('section',SectionController::class);
    Route::resource('teacher',TeacherController::class);
    Route::resource('guide',TeacherGuideController::class);
    Route::resource('subject',SubjectController::class);
    Route::resource('student',StudentController::class);
    Route::resource('schedule',ScheduleController::class);
    Route::resource('day',DayController::class);
    Route::resource('period',PeriodController::class);
    Route::resource('user',UserController::class);
    Route::post('user/changePassword/{user}', [UserController::class, 'changePassword'])->name('changePassword');
    // Route::get('/find/grade', function () {
    //     return view('schoolTemplate.Schedule.gradeSearch');
    // });
    // Route::get('/find/grade', [OtherController::class, 'grade']);
    // Route::get('/find/teacher', [OtherController::class, 'teacher']);
    Route::get('teacherandsection', [ScheduleController::class, 'getteacherandsection'])->name('getteacherandsection');
    Route::get('teacherandsubject', [ScheduleController::class, 'getteacherandsubject'])->name('getteacherandsubject');
    Route::get('sectionschedules', [ScheduleController::class, 'getsectionschedules'])->name('getsectionschedules');
    Route::get('teacherschedules', [ScheduleController::class, 'getteacherschedules'])->name('getteacherschedules');

    Route::get('oldStudent', [StudentController::class, 'getoldStudent'])->name('getoldStudent');
    Route::post('student/oldStudentstore', [StudentController::class, 'getoldStudentstore'])->name('getoldStudentstore');

    Route::get('/overallprint', [PrintController::class, 'overallprint'])->name('overallprint');
    Route::get('/gradeprint/{id}', [PrintController::class, 'gradeprint'])->name('gradeprint');
    Route::get('/teacherprint/{id}', [PrintController::class, 'teacherprint'])->name('teacherprint');
});

Auth::routes(['register'=>false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\frontendController::class, 'index'])->name('frontend');
Route::get('/team', [App\Http\Controllers\frontendController::class, 'team'])->name('team');
Route::get('/contact', [App\Http\Controllers\frontendController::class, 'contact'])->name('contact');

