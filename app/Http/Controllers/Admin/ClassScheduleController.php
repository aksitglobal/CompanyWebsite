<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClassScheduleController extends Controller
{
    public function index()
    {
        $current = ClassSchedule::current();
        $pdfUrl  = $current ? asset('storage/' . $current->pdf_path) : null;
        return view('admin.class-schedule.index', compact('current', 'pdfUrl'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pdf_file' => 'required|file|mimes:pdf|max:20480', // max 20MB
        ]);

        // Delete old PDF if exists
        $old = ClassSchedule::current();
        if ($old && Storage::disk('public')->exists($old->pdf_path)) {
            Storage::disk('public')->delete($old->pdf_path);
            $old->delete();
        }

        // Store new PDF
        $path = $request->file('pdf_file')->store('class-schedule', 'public');

        ClassSchedule::create([
            'pdf_path'    => $path,
            'uploaded_at' => now(),
        ]);

        return redirect()->route('admin.class-schedule.index')
            ->with('success', 'Class Schedule PDF uploaded successfully.');
    }

    public function destroy()
    {
        $current = ClassSchedule::current();

        if (!$current) {
            return redirect()->route('admin.class-schedule.index')
                ->with('error', 'No PDF to delete.');
        }

        if (Storage::disk('public')->exists($current->pdf_path)) {
            Storage::disk('public')->delete($current->pdf_path);
        }

        $current->delete();

        return redirect()->route('admin.class-schedule.index')
            ->with('success', 'Class Schedule PDF deleted successfully.');
    }
}
