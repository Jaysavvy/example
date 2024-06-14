<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Models\job;





Route::get('/', function () {
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::resource('jobs', JobController::class);

// Route::controller(JobController::class)->group(function () {

//     // Index get all jobs
//     Route::get('/jobs', 'index');

//     // Create a new job
//     Route::get('/jobs/create',  'create');


//     // Show a single job
//     Route::get('/jobs/{job}',  'show');



//     // Store a new job
//     Route::post('/jobs', 'store');


//     // edit a job
//     Route::get('/jobs/{job}/edit', 'edit');



//     // update a job
//     Route::patch('/jobs/{job}', 'update');


//     // Destroy a job
//     Route::delete('/jobs/{job}', 'destroy');
// });
