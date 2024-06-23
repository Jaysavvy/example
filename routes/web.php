<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Models\job;



Route::get('test', function () {

    $job = Job::first();

    App\Jobs\TranslateJob::dispatch();

    return 'Tested';
});

Route::get('/', function () {
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [jobController::class, 'create']);
Route::post('/jobs', [jobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [jobController::class, 'show']);

Route::get('/jobs/{job}/edit', [jobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::patch('/jobs/{job}', [JobController::class, 'update'])->middleware('auth')->can('edit-job', 'job');
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->middleware('auth')->can('edit-job', 'job');



// Route::resource('jobs', JobController::class)->only(['index', 'show']);
// Route::resource('jobs', JobController::class)->except(['index', 'show'])->middleware('auth');

//Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);




//Login
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
