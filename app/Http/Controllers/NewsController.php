<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;

class NewsController extends Controller
{
    public function home()
    {
        $activeNews = News::where('is_active', true)->get();
        return view('pages.home', compact('activeNews'));
    }

    public function index()
    {
        $newsItems = News::orderBy('created_at', 'desc')->get();
        return view('admin.news.index', compact('newsItems'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate(['news_text' => 'required|string|max:255']);
        News::create([
            'news_text' => $request->news_text,
            'is_active' => $request->has('is_active') ? true : false,
        ]);
        return redirect()->route('admin.news.index')->with('success', 'News created successfully.');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['news_text' => 'required|string|max:255']);
        $news = News::findOrFail($id);
        $news->update([
            'news_text' => $request->news_text,
            'is_active' => $request->has('is_active') ? true : false,
        ]);
        return redirect()->route('admin.news.index')->with('success', 'News updated successfully.');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $news = News::findOrFail($id);
        $news->is_active = !$news->is_active;
        $news->save();
        return redirect()->route('admin.news.index')->with('success', 'Status toggled successfully.');
    }
}
