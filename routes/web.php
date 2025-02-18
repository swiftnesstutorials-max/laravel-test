
<?php  
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\admin\UserController as AdminUserController;


//use App\Http\Middlewre\middlewaretoken;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware'=>'guest'],function(){
});
Route::view('/login','login')->name('login');
Route::post('/login',[UserController::class,'login'])->name('
loginStore');
Route::view('/register','register')->name('register');
 Route::post('/register',[UserController::class,'register'])->name('registerStore');

Route::group(['middleware'=>'auth'],function(){
Route::view('/dashboard','dashboard')->name('dashboard');
Route::get('/logout',[UserController::class,'logout'])->name('
user.logout');
});
Route::view('admin/login','admin.login')->name('admin_login');
Route::post('admin/login',[AdminUserController::class,'login'])->name('
AdminloginStore');
Route::view('admin/dashboard','admin.dashboard')->name('admin_dashboard');



Route::post('/levels',[LevelController::class,'store'])->name('level.store');
Route::get('/levels',[LevelController::class,'index'])->name('level');
Route::get('/levels/{id}/edit',[LevelController::class,'edit'])->name('level.edit');
Route::post('/levels/{level}/update',[LevelController::class,'update'])->name('level.update');
Route::delete('/levels/{level}/destroy',[LevelController::class,'destroy'])->name('level.destroy');

Route::get('/students',[StudentController::class,'index'])->name('student');
Route::post('/students',[StudentController::class,'store'])->name('student.store');
Route::get('/students/create',[StudentController::class,'create'])->name('student.create');
Route::get('/students/{student}/edit',[StudentController::class,'edit'])->name('student.edit');
Route::post('/students/{student}/update',[StudentController::class,'update'])->name('student.update');
Route::delete('/students/{id}/delete',[StudentController::class,'destroy'])->name('student.destroy');

Route::get('/subjects',[SubjectController::class,'index'])->name('subject');
Route::post('/subjects',[SubjectController::class,'store'])->name('subject.store');