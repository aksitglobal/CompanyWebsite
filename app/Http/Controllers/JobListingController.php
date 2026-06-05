<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\JobListing;

class JobListingController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->query('type', 'internship');
        
        $listings = JobListing::where('is_active', true)
            ->where('type', $type)
            ->latest()
            ->get();
            
        return view('pages.career', compact('listings', 'type'));
    }
}
