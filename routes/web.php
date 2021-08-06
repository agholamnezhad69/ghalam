<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\adminController;

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
    return view('admin.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'],
    function () {
        Route::get('/index', [adminController::class, 'index',])->name('admin.index');
        Route::post('/amozeshgah_add', [adminController::class, 'amozeshgah_add',])->name('admin.amozeshgah_add');
        Route::post('/branch_add', [adminController::class, 'branch_add',])->name('admin.branch_add');
        Route::get('/amozeshgah_get', [adminController::class, 'amozeshgah_get',])->name('admin.amozeshgah_get');
        Route::post('/get_amozeshgah_branch', [adminController::class, 'get_amozeshgah_branch',])->name('admin.get_amozeshgah_branch');
        Route::post('/edit_amozeshgah', [adminController::class, 'edit_amozeshgah',])->name('admin.edit_amozeshgah');
        Route::post('/branchSelect', [adminController::class, 'branchSelect',])->name('admin.branchSelect');



        Route::post('/remove_amozeshgah', [adminController::class, 'remove_amozeshgah',])->name('admin.remove_amozeshgah');
        Route::post('/user_add', [adminController::class, 'user_add',])->name('admin.user_add');
        Route::get('/user_get', [adminController::class, 'user_get',])->name('admin.user_get');
        Route::post('/get_branches', [adminController::class, 'get_branches',])->name('admin.get_branches');
        Route::post('/user_access_branch', [adminController::class, 'user_access_branch',])->name('admin.user_access_branch');
        Route::post('/remove_user', [adminController::class, 'remove_user',])->name('admin.remove_user');
        Route::post('/base_add', [adminController::class, 'base_add',])->name('admin.base_add');
        Route::get('/base_get', [adminController::class, 'base_get',])->name('admin.base_get');

        Route::post('/remove_base', [adminController::class, 'remove_base',])->name('admin.remove_base');
        Route::get('/get_bases', [adminController::class, 'get_bases',])->name('admin.get_bases');
        Route::get('/amozeshgah_get_for_select', [adminController::class, 'amozeshgah_get_for_select',])->name('admin.amozeshgah_get_for_select');
        Route::post('/amozeshgahSelect', [adminController::class, 'amozeshgahSelect',])->name('admin.amozeshgahSelect');


        Route::post('/lesson_add', [adminController::class, 'lesson_add',])->name('admin.lesson_add');
        Route::get('lesson_get', [adminController::class, 'lesson_get',])->name('admin.lesson_get');
        Route::get('teacher_get', [adminController::class, 'teacher_get',])->name('admin.teacher_get');
        Route::post('/remove_lesson', [adminController::class, 'remove_lesson',])->name('admin.remove_lesson');
        Route::post('/baseSelect', [adminController::class, 'baseSelect',])->name('admin.baseSelect');




        Route::post('/teacher_pic_Dropzone', [adminController::class, 'teacher_pic_Dropzone',])->name('admin.teacher_pic_Dropzone');
        Route::post('/teacher_pic_Dropzone_remove', [adminController::class, 'teacher_pic_Dropzone_remove',])->name('admin.teacher_pic_Dropzone_remove');
        Route::post('/teacher_add', [adminController::class, 'teacher_add',])->name('admin.teacher_add');
        Route::post('/get_teacher_img_for_edit', [adminController::class, 'get_teacher_img_for_edit',])->name('admin.get_teacher_img_for_edit');
        Route::post('/remove_teacher', [adminController::class, 'remove_teacher',])->name('admin.remove_teacher');
        Route::post('/majorSelect', [adminController::class, 'majorSelect',])->name('admin.majorSelect');
        Route::post('/baseSelectForLesson', [adminController::class, 'baseSelectForLesson',])->name('admin.baseSelectForLesson');
        Route::post('/teacherLesson', [adminController::class, 'teacherLesson',])->name('admin.teacherLesson');
        Route::post('/get_teacherLesson', [adminController::class, 'get_teacherLesson',])->name('admin.get_teacherLesson');
        Route::post('/remove_teacher_lesson', [adminController::class, 'remove_teacher_lesson',])->name('admin.remove_teacher_lesson');



        Route::post('/major_add', [adminController::class, 'major_add',])->name('admin.major_add');
        Route::get('/major_get', [adminController::class, 'major_get',])->name('admin.major');
        Route::post('/remove_major', [adminController::class, 'remove_major',])->name('admin.remove_major');


    });
