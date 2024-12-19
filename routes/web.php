<?php
use App\Http\Controllers\admin\YearController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\MajorsController;
use App\Http\Controllers\admin\ProvinceController;
use App\Http\Controllers\Admin\ApplicantController;
use App\Http\Controllers\admin\CutoffScoresController;
use App\Http\Controllers\admin\SubjectBlocksController;

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
;

Route::name('quantri.')->middleware('role.access', 'auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->middleware(['auth'])->name('admin');
    Route::resource('user', UserController::class);
    Route::resource('subject_blocks', SubjectBlocksController::class);
    Route::resource('majors', MajorsController::class);
    Route::resource('years', YearController::class);
    Route::get('cutoff_scores/years', [CutoffScoresController::class, 'yearIndex'])->name('cutoff_scores.years');
    Route::get('cutoff_scores/year/{yearId}', [CutoffScoresController::class, 'showByYear'])->name('cutoff_scores.showByYear');
    Route::get('cutoff_scores/editByYear/{yearId}', [CutoffScoresController::class, 'editByYear'])->name('cutoff_scores.editByYear');
    Route::put('cutoff_scores/updateByYear/{yearId}', [CutoffScoresController::class, 'updateByYear'])->name('cutoff_scores.updateByYear');
    Route::delete('school_years/{id}', [CutoffScoresController::class, 'destroy'])->name('school_years.destroy');

    Route::resource('cutoff_scores', CutoffScoresController::class);
    Route::resource('province', ProvinceController::class);
    Route::resource('feedback', FeedbackController::class);
    Route::get('/with-cutoff-scores', [ApplicantController::class, 'withCutoffScores'])->name('applicants.withCutoffScores');

});
Route::resource('applicants', ApplicantController::class);

Route::get('/result', [ApplicantController::class, 'SearchResult'])->name('applicants.SearchResult');
Route::get('/searchResult', [ApplicantController::class, 'getSearchResult'])->name('applicants.getSearchResult');
Route::get('/contact/{code}', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact/{code}', [ContactController::class, 'send'])->name('contact.send');


// Route::get('/admin', function () {
//     return view('admin.index');
// })->middleware(['auth', 'verified'])->name('admin');


Route::get('/trang-chu', [\App\Http\Controllers\website\HomeController::class, "index"])->name("trangchu.index");


require __DIR__ . '/auth.php';
