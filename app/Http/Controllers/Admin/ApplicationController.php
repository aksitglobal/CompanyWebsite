<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::orderBy('created_at', 'desc')->get();
        return view('admin.applications.index', compact('applications'));
    }

    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        
        // Delete CV file from storage
        if ($application->cv_path && Storage::disk('public')->exists($application->cv_path)) {
            Storage::disk('public')->delete($application->cv_path);
        }

        $application->delete();
        
        return redirect()->back()->with('success', 'Application and associated CV deleted successfully.');
    }
}
