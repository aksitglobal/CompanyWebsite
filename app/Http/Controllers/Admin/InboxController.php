<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::orderByRaw('is_read ASC')->orderBy('created_at', 'desc')->get();
        $unreadCount = ContactMessage::where('is_read', false)->count();

        return view('admin.inbox.index', compact('messages', 'unreadCount'));
    }

    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);

        // Auto mark as read when opened
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        $unreadCount = ContactMessage::where('is_read', false)->count();

        return view('admin.inbox.show', compact('message', 'unreadCount'));
    }

    public function markAsRead($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->update(['is_read' => true]);

        return redirect()->route('admin.inbox.show', $id)->with('success', 'Message marked as read.');
    }

    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.inbox.index')->with('success', 'Message deleted successfully.');
    }
}
