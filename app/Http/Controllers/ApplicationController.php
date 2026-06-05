<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function create(Request $request)
    {
        $position = $request->query('position', '');
        return view('pages.apply', compact('position'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'position' => 'required|string|max:255',
            'cover_letter' => 'nullable|string',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:5120', // max 5MB
        ]);

        $cvPath = null;
        if ($request->hasFile('cv')) {
            // Save CV to storage/app/public/cvs/
            $cvPath = $request->file('cv')->store('cvs', 'public');
        }

        Application::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'position' => $request->position,
            'cover_letter' => $request->cover_letter,
            'cv_path' => $cvPath,
        ]);

        return redirect()->back()->with('success', 'Your application has been submitted successfully!');
    }
}
