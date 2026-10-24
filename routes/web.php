<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InfoGrafikaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FrondController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\empCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomePageImageTagController;
use App\Http\Controllers\ParentInfoController;
use App\Models\Employee;
use App\Models\Lesson;
use App\Models\Post;
use App\Models\Statictik;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🌐 Tilni o‘zgartirish
Route::get('/lang/{locale}', function ($locale) {
    abort_unless(in_array($locale, ['uz', 'ru'], true), 404);
    session(['lang' => $locale]);
    return redirect()->back();
});

// 🏫 Maktab sahifalari
Route::get('/', [FrondController::class, 'index'])->name('index');
Route::get('/schooltack', [FrondController::class,'schoolTack'])->name('schooltack');
Route::get('/leaderShep', [FrondController::class,'leaderShep'])->name('leaderShep');
Route::get('/leaderShep/detail/{id}', [FrondController::class, 'leaderShepDetail'])->name('leaderShep.detail');
Route::get('/teachers', [FrondController::class,'teachers'])->name('teachers');
Route::get('/teachers/search', [FrondController::class, 'teachers'])->name('teachers.search');
Route::get('/teachers/{id}', [FrondController::class, 'teacherDetail'])->name('teacher.detail');

Route::get('/rekvizit', [FrondController::class,'rekvizit'])->name('rekvizit');
Route::get('/education', [FrondController::class,'education'])->name('education');
Route::get('/parents', [FrondController::class, 'parents'])->name('parents');
Route::get('/newsDetail/{id}', [FrondController::class, 'newsDetail'])->name('newsDetail');
Route::get('/educationDetail/{id}', [FrondController::class, 'educationDetail'])->name('educationDetail');
Route::get('/usefulresurs', [FrondController::class,'usefulresurs'])->name('usefulresurs');
Route::get('/schoolNews',[FrondController::class,'schoolNews'])->name('schoolNews');
Route::get('/education/category/{category}', [FrondController::class, 'educationByCategory'])->name('education.category');
Route::get('/Gallery', [FrondController::class,'gallery'])->name('Gallery');
Route::get('/Gallery/{id}', [FrondController::class,'galleryDetail'])->name('galleryDetail');
Route::get('/infoGrafika', [FrondController::class,'infoGrafika'])->name('infoGrafika');
Route::get('/connect', [FrondController::class,'connect'])->name('connect');
Route::post('/SendEmail', [FrondController::class,'SendEmail'])->name('SendEmail');

// 🔍 Qidiruv
Route::get('/education/search', [FrondController::class, 'educationSearch'])->name('education.search');
Route::get('/education/connect', [FrondController::class, 'connect'])->name('education.connect');
Route::get('/search-posts', [FrondController::class, 'searchPosts'])->name('search.posts');

// 📚 Foydali resurslar
Route::get('/useful-resources/{resource}', [FrondController::class, 'usefulResourceDetail'])->name('useful-resources.detail');

// 📤 CKEditor yuklash
Route::post('ckeditor/upload', [\App\Http\Controllers\CKEditorController::class, 'upload'])->name('admin.ckeditor.upload');

// 🛠️ Admin panel yo‘nalishlari
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard', [
            'studentCount' => Statictik::latest()->value('studentsCount') ?? 0,
            'teacherCount' => Employee::whereHas('category', function ($query) {
                $query->where('name_uz', 'like', '%o‘qituvchi%')
                    ->orWhere('name_uz', 'like', "%O'qituvchi%")
                    ->orWhere('name_uz', 'like', "%O`qituvchi%");
            })->count(),
            'lessonCount' => Lesson::count(),
            'newsCount' => Post::count(),
        ]);
    })->middleware('auth')->name('dashboard');

    Route::resource('category', CategoryController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('position', PositionController::class);
    Route::resource('empCategory', empCategoryController::class);
    Route::resource('CategoryTop', \App\Http\Controllers\CategoryTop::class);
    Route::resource('posts', \App\Http\Controllers\PostsController::class);
    Route::resource('statictik', \App\Http\Controllers\StatictikController::class);
    Route::resource('gallery', GalleryController::class);
    
    Route::resource('infografika', InfoGrafikaController::class);
    Route::resource('smenatype', \App\Http\Controllers\SmenaTypeController::class);
    Route::resource('schedule', \App\Http\Controllers\SchudeliController::class);
    Route::resource('lesson', \App\Http\Controllers\LessonController::class);
    Route::resource('usefulResource', \App\Http\Controllers\UserfulController::class);
    Route::resource('HomePageImageTag', HomePageImageTagController::class);
    Route::resource('parentInfo', ParentInfoController::class);
    Route::resource('categorychildren', \App\Http\Controllers\ChildrenCategoryController::class);
});

// 👤 Profil sahifalari
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
