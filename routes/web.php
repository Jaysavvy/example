<?php


use Illuminate\Support\Facades\Route;
use App\Models\job;





Route::get('/', function () {
    $jobs = Job::all();


    // return view('home');

});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->paginate(7);


    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});



Route::get('/contact', function () {
    return view('contact');
});
