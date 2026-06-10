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
        $applications = Application::orderByRaw('is_read ASC')->orderBy('created_at', 'desc')->get();
        return view('admin.applications.index', compact('applications'));
    }

    public function markRead($id)
    {
        Application::findOrFail($id)->update(['is_read' => true]);
        return redirect()->back()->with('success', 'Application marked as read.');
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
