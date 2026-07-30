<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PartnerLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerLogoController extends Controller
{
    public function index()
    {
        $logos = PartnerLogo::orderBy('order')->get();
        return view('admin.partner-logos.index', compact('logos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:100',
            'logo'  => 'required|file|mimes:png,jpg,jpeg,svg|max:2048',
            'order' => 'nullable|integer|min:0',
        ]);

        $path = $request->file('logo')->store('partner-logos', 'public');

        PartnerLogo::create([
            'name'      => $request->name,
            'logo_path' => $path,
            'is_active' => true,
            'order'     => $request->input('order', 0),
        ]);

        return redirect()->route('admin.partner-logos.index')
                         ->with('success', 'Logo uploaded successfully.');
    }

    public function destroy($id)
    {
        $logo = PartnerLogo::findOrFail($id);

        if (Storage::disk('public')->exists($logo->logo_path)) {
            Storage::disk('public')->delete($logo->logo_path);
        }

        $logo->delete();

        return redirect()->route('admin.partner-logos.index')
                         ->with('success', 'Logo deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $logo = PartnerLogo::findOrFail($id);
        $logo->is_active = !$logo->is_active;
        $logo->save();

        return redirect()->route('admin.partner-logos.index')
                         ->with('success', 'Logo status updated.');
    }

    public function updateOrder(Request $request)
    {
        $request->validate([
            'id'    => 'required|exists:partner_logos,id',
            'order' => 'required|integer|min:0',
        ]);

        PartnerLogo::where('id', $request->id)->update(['order' => $request->order]);

        return response()->json(['success' => true]);
    }
}
