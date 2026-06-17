<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeeStructureController extends Controller
{
    public function index()
    {
        $currentPdf = Setting::get('fee_structure_pdf');
        return view('admin.fee-structure.index', compact('currentPdf'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'pdf_file' => 'required|file|mimes:pdf|max:20480', // max 20MB
        ]);

        // Delete old PDF if exists
        $oldPath = Setting::get('fee_structure_pdf');
        if ($oldPath && Storage::disk('public')->exists($oldPath)) {
            Storage::disk('public')->delete($oldPath);
        }

        // Store new PDF
        $path = $request->file('pdf_file')->store('fee-structure', 'public');

        // Save to settings
        Setting::set('fee_structure_pdf', $path);

        return redirect()->route('admin.fee-structure.index')
            ->with('success', 'Fee structure PDF uploaded successfully.');
    }
}
