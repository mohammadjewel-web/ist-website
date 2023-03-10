<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\auth;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GuestRegisterController;
use App\Http\Controllers\GuestLoginController;
use App\Http\Controllers\GuestController;

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
//frontEnd route
Route::get('/',[FrontendController::class, 'index'])->name('/');
Route::get('/about',[FrontendController::class, 'about'])->name('about');
Route::get('/about/details/{id}',[FrontendController::class, 'aboutDetails'])->name('about.details');
Route::get('/courses',[FrontendController::class, 'courses'])->name('courses');
Route::get('/courses/details/{slug}',[FrontendController::class, 'coursesDetails'])->name('courses.details');
Route::get('/teacher',[FrontendController::class, 'teacher'])->name('teacher');
Route::get('/teacher/details{slug}',[FrontendController::class, 'teacherDetails'])->name('teacher.details');
Route::get('/contact',[FrontendController::class, 'contact'])->name('contact');
Route::get('/event',[FrontendController::class, 'event'])->name('event');
Route::get('/event/details/{id}',[FrontendController::class, 'eventDetails'])->name('event.details');
Route::get('/blog',[FrontendController::class, 'blogs'])->name('blog');
Route::get('/blog/details{slug}',[FrontendController::class, 'blogDetails'])->name('blog.details');

//Guest Register
Route::get('/guest/register', [GuestRegisterController::class, 'guest_register'])->name('guest.register');
Route::get('/guest/login', [GuestRegisterController::class, 'guest_login'])->name('guest.login');
Route::post('/guest/store', [GuestRegisterController::class, 'guest_store'])->name('guest.store');

//Guest Login
Route::post('/guest/login/request', [GuestLoginController::class, 'guest_login_req'])->name('guest.login.req');
Route::get('/guest/logout', [GuestLoginController::class, 'guest_logout'])->name('guest.logout');


//Reset Password
Route::get('/guest/pass/reset/req', [GuestController::class, 'pass_reset_req'])->name('guest.pass.reset.req');
Route::post('/guest/pass/reset/req/send', [GuestController::class, 'pass_reset_req_send'])->name('guest.pass.reset.req.send');
Route::get('/guest/pass/reset/form/{token}', [GuestController::class, 'pass_reset_form'])->name('guest.pass.reset.form');
Route::post('/guest/pass/reset', [GuestController::class, 'guest_pass_reset'])->name('guest.pass.reset');


//Email Verify
Route::get('/verify/mail/confirm/{token}', [GuestRegisterController::class, 'verify_mail'])->name('verify.mail.confirm');
Route::get('/verify/mail/req', [GuestRegisterController::class, 'mail_verify_req'])->name('mail.verify.req');
Route::post('/verify/mail/again', [GuestRegisterController::class, 'mail_verify_again'])->name('mail.verify.again');





Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//users
Route::get('/user', [UserController::class, 'users'])->name('user');
Route::get('/user/delete/{user_id}', [UserController::class, 'userDelete'])->name('user.delete');
Route::get('/edit/profile', [UserController::class, 'profileEdit'])->name('profile.edit');
Route::post('/profile/update', [UserController::class, 'profileUpdate'])->name('profile.update');
Route::post('/photo/update', [UserController::class, 'photoUpdate'])->name('photo.update');
Route::post('/user/check/delete', [UserController::class, 'deleteCheck'])->name('delete.check');
Route::get('/trash', [UserController::class, 'trash'])->name('trash');
Route::get('/restore/{id}', [UserController::class, 'restore'])->name('user.restore');
Route::get('/user/delete/hard/{user_id}', [UserController::class, 'userDeleteHard'])->name('user.delete.hard');
Route::post('/user/check/hard/delete', [UserController::class, 'userCheckDeleteHard'])->name('hard.delete.check');

//category
Route::get('/category', [CategoryController::class, 'category'])->name('category');
Route::post('/category/store', [CategoryController::class, 'categoryStore'])->name('category.store');
Route::get('/category/delete/{category_id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');
Route::get('/category/edit/{category_id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
Route::post('/category/update}', [CategoryController::class, 'categoryUpdate'])->name('category.update');


//Tags
Route::get('/tags', [TagController::class, 'tag'])->name('tag');
Route::post('/tag/store', [TagController::class, 'tagStore'])->name('tag.store');
Route::get('/tag/delete/{category_id}', [TagController::class, 'tagDelete'])->name('tag.delete');


//Role manager
Route::get('/role', [RoleController::class, 'role'])->name('role');
Route::post('/permission/store', [RoleController::class, 'permissionStore'])->name('permission.store');
Route::post('/role/store', [RoleController::class, 'roleStore'])->name('role.store');
Route::post('/assign/role', [RoleController::class, 'assignRole'])->name('assign.role');
Route::get('/role/remove/{user_id}', [RoleController::class, 'removeRole'])->name('remove.role');
Route::get('/edit/user/role/permission/{user_id}', [RoleController::class, 'EditUserRolePermission'])->name('edit.user.role.permission');
Route::post('/permission/update', [RoleController::class, 'permissionUpdate'])->name('permission.update');


//slider
Route::get('/slider', [SliderController::class, 'slider'])->name('slider');
Route::post('/slider/add', [SliderController::class, 'addSlider'])->name('add.slider');
Route::get('/slider/manage', [SliderController::class, 'manageSlider'])->name('manage.slider');
Route::get('/status/slider/{id}', [SliderController::class, 'statusSlider'])->name('status.slider');
Route::get('/edit/slider/{id}', [SliderController::class, 'editSlider'])->name('edit.slider');
Route::post('/update/slider', [SliderController::class, 'updateSlider'])->name('update.slider');
Route::get('/delete/slider/{id}', [SliderController::class, 'deleteSlider'])->name('delete.slider');


//about us
Route::get('/about/add', [AboutController::class, 'about'])->name('add.about');
Route::post('/about/us/add', [AboutController::class, 'addAboutUs'])->name('add.about.us');
Route::get('/about/manage', [AboutController::class, 'manageAbout'])->name('manage.about');
Route::get('/about/slider/{id}', [AboutController::class, 'statusAbout'])->name('status.about');
Route::get('/edit/about/{id}', [AboutController::class, 'editAbout'])->name('edit.about');
Route::post('/update/about', [AboutController::class, 'updateAbout'])->name('update.about');
Route::get('/delete/about/{id}', [AboutController::class, 'deleteAbout'])->name('delete.about');


//post
Route::get('/add/post', [PostController::class, 'addPost'])->name('add.post');
Route::post('/blog/add/post', [PostController::class, 'postStore'])->name('post.store');
Route::get('/my/post', [PostController::class, 'myPost'])->name('my.post');
Route::get('/post/view/{post_id}', [PostController::class, 'postView'])->name('post.view');
Route::get('/post/delete/{post_id}', [PostController::class, 'postDelete'])->name('post.delete');
Route::get('/post/edit/{post_id}', [PostController::class, 'postEdit'])->name('post.edit');
Route::post('/post/update', [PostController::class, 'postUpdate'])->name('post.update');


//courses
Route::get('/add/courses', [CoursesController::class, 'addCourses'])->name('add.courses');
Route::post('/add/courses/store', [CoursesController::class, 'coursesStore'])->name('courses.store');
Route::get('/manage/courses', [CoursesController::class, 'manageCourses'])->name('manage.courses');
Route::get('/course/view/{course_id}', [CoursesController::class, 'courseView'])->name('course.view');
Route::get('/course/delete/{course_id}', [CoursesController::class, 'courseDelete'])->name('course.delete');
Route::get('/course/edit/{course_id}', [CoursesController::class, 'courseEdit'])->name('course.edit');
Route::post('/course/update', [CoursesController::class, 'courseUpdate'])->name('course.update');


//teacher
Route::get('/teacher/information', [TeacherController::class, 'addTeacherInformation'])->name('add.teacher.information');
Route::post('/add/teacher/information/store', [TeacherController::class, 'teacherInformationStore'])->name('teacher.information.store');
Route::get('/manage/teacher/information/store', [TeacherController::class, 'manageTeacherInformation'])->name('manage.teacher.information');
Route::get('/teacher/view/{teacher_id}', [TeacherController::class, 'teacherView'])->name('teacher.view');
Route::get('/teacher/delete/{teacher_id}', [TeacherController::class, 'teacherDelete'])->name('teacher.delete');
Route::get('/teacher/edit/{teacher_id}', [TeacherController::class, 'teacherEdit'])->name('teacher.edit');
Route::post('/teacher/update', [TeacherController::class, 'teacherUpdate'])->name('teacher.update');


//event
Route::get('/add/event', [EventController::class, 'addEvent'])->name('add.event');
Route::post('/add/event', [EventController::class, 'eventStore'])->name('event.store');
Route::get('/manage/event', [EventController::class, 'manageEvent'])->name('manage.event');
Route::get('/event/view/{event_id}', [EventController::class, 'eventView'])->name('event.view');
Route::get('/event/delete/{event_id}', [EventController::class, 'eventDelete'])->name('event.delete');
Route::get('/event/edit/{event_id}', [EventController::class, 'eventEdit'])->name('event.edit');
Route::post('/event/update', [EventController::class, 'eventUpdate'])->name('event.update');

//Comments
Route::post('/comment/store', [GuestController::class, 'comment_store'])->name('comment.store');






