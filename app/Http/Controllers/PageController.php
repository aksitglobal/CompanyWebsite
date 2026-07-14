<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\ServiceContent;
use App\Models\ClassSchedule;
use App\Http\Controllers\Admin\ServiceContentController;
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

    public function classSchedule()
    {
        $schedule = ClassSchedule::current();
        $pdfUrl   = $schedule ? asset('storage/' . $schedule->pdf_path) : null;
        return view('pages.class-schedule', compact('pdfUrl'));
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

    /**
     * Dynamic per-service page — loads content from DB.
     */
    public function servicePage(string $slug)
    {
        $allServices = ServiceContentController::allServices();
        abort_unless(array_key_exists($slug, $allServices), 404);

        $label    = $allServices[$slug];
        $contents = ServiceContent::forSlug($slug)->get();

        return view('pages.service-detail', compact('slug', 'label', 'contents'));
    }
}
