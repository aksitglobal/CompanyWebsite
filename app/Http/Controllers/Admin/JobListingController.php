<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobListing;

class JobListingController extends Controller
{
    public function index()
    {
        $jobs = JobListing::latest()->get();
        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:internship,job',
            'badge' => 'nullable|string|max:255',
        ]);

        JobListing::create([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'badge' => $request->badge,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.jobs.index')->with('success', 'Job listing added successfully.');
    }

    public function edit($id)
    {
        $job = JobListing::findOrFail($id);
        return view('admin.jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:internship,job',
            'badge' => 'nullable|string|max:255',
        ]);

        $job = JobListing::findOrFail($id);
        $job->update([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'badge' => $request->badge,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.jobs.index')->with('success', 'Job listing updated successfully.');
    }

    public function destroy($id)
    {
        $job = JobListing::findOrFail($id);
        $job->delete();

        return redirect()->route('admin.jobs.index')->with('success', 'Job listing deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $job = JobListing::findOrFail($id);
        $job->is_active = !$job->is_active;
        $job->save();

        return redirect()->back()->with('success', 'Job listing status updated.');
    }
}
