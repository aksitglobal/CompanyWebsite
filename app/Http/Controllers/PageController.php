<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function courses()
    {
        return view('pages.courses');
    }

    public function feeStructure()
    {
        $pdfPath = Setting::get('fee_structure_pdf');
        $pdfUrl  = $pdfPath ? asset('storage/' . $pdfPath) : null;
        return view('pages.fee-structure', compact('pdfUrl'));
    }

    public function services()
    {
        return view('pages.services');
    }

    public function itSolutions()
    {
        return view('pages.it-solutions');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function career(Request $request)
    {
        $type = $request->query('type', 'internship');
        return view('pages.career', compact('type'));
    }
}
