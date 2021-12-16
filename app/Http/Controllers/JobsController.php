<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobsController extends Controller
{
    public function __construct()
    {
        // Verifica se o usuário está logado
        $this->middleware('auth');
    }

    function index()
    {
        $jobs = Job::all();
        return view('jobs.list', compact('jobs'));
    }

    function new()
    {
        return view('jobs.form');
    }

    function add(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:500'
        ]);
        Job::create($validated);
        return redirect()->route('jobs');
    }

    function edit($id)
    {
        $job = Job::find($id);
        return view('jobs.form', compact('job'));
    }

    function update(Request $request, $id)
    {
        $validated = $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:500'
        ]);
        Job::find($id)->update($validated);
        return redirect()->route('job.update', $id)->with('success', 'Job updated successfully');
    }

    function delete($id)
    {

        $job = Job::find($id);

        if ($job->employees > 0) {
            return redirect()->route('jobs')->with('warning', 'Job cannot be deleted because it has employees');
        }

        $job->delete();
        return redirect()->route('jobs')->with('success', 'Job deleted successfully');
    }
}
