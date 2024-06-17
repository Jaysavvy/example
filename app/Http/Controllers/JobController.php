<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\job;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate as FacadesGate;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->paginate(7);


        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
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
    }


    public function edit(Job $job)
    {

        FacadesGate::authorize('edit-job', $job);

        return view('jobs.edit', ['job' => $job]);
    }


    public function update(Job $job)
    {
        //authorize (On Hold...)
        FacadesGate::authorize('edit-job', $job);


        //validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);



        //update the job
        // $job = Job::findOrFail($id);
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
    }

    public function destroy(Job $job)
    {
        // authorize (On Hold...)
        FacadesGate::authorize('edit-job', $job);


        // delete the job
        $job->delete();
        // redirect

        return redirect('/jobs');
    }
}
