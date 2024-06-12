<?php


use Illuminate\Support\Facades\Route;
use App\Models\job;





Route::get('/', function () {
    return view('home');
});

// Index get all jobs
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->paginate(7);


    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

// Create a new job
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Show a single job
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

// Store a new job
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect('/jobs');
});

// edit a job
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);

    return view('jobs.edit', ['job' => $job]);
});

// update a job
Route::patch('/jobs/{id}', function ($id) {
    //validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    //authorize (On Hold...)

    //update the job
    $job = Job::findOrFail($id);
    $job->title = request('title');
    $job->salary = request('salary');


    //alternative to updating
    // $job->update([
    //     'title' => request('title'),
    //     'salary' => request('salary')
    // ]);


    // and persist
    $job->save();

    //redirect to the job page
    return redirect('/jobs/' . $job->id);
});

// Destroy a job
Route::delete('/jobs/{id}', function ($id) {
    // authorize (On Hold...)

    // delete the job
    $job = Job::findOrFail($id);
    $job->delete();
    // redirect

    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
