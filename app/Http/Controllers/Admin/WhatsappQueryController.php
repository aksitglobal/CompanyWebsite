<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhatsappQuery;

class WhatsappQueryController extends Controller
{
    /**
     * Display all WhatsApp project queries.
     */
    public function index()
    {
        $queries = WhatsappQuery::orderBy('created_at', 'desc')->get();
        return view('admin.whatsapp-queries.index', compact('queries'));
    }

    /**
     * Delete a WhatsApp project query.
     */
    public function destroy($id)
    {
        $query = WhatsappQuery::findOrFail($id);
        $query->delete();

        return redirect()->back()->with('success', 'WhatsApp query deleted successfully.');
    }
}
