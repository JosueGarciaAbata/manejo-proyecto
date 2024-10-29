<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    
    public function index()
    {
        $news = News::orderBy('fec_pub_new', 'desc')->paginate(6);
        return view('pages.news', compact('news'));
    }

    public function show($id)
    {
        $newsItem = News::findOrFail($id);
        $latestNews = $this->latestNews();
        $randomTags = $this->getSidebarTags();
        return view('pages.news-details', compact('newsItem', 'latestNews', 'randomTags'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'date' => 'nullable|date',
            'query' => 'nullable|string',
        ]);
        
        $query = News::query();
        
        if ($request->filled('date')) {
            $query->whereDate('fec_pub_new', $request->input('date'));
        }
        
        if ($request->filled('query')) {
            $keywords = explode(',', $request->input('query'));
            
            $query->where(function ($q) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $q->orWhere('tit_new', 'LIKE', '%' . trim($keyword) . '%')
                      ->orWhere('tag_new', 'LIKE', '%' . trim($keyword) . '%');
                }
            });
        }
        
        $news = $query->orderBy('fec_pub_new', 'desc')->paginate(6);
        
        return view('pages.news', compact('news'));
    }    
    
    public function searchByTag(Request $request)
    {
        $request->validate([
            'tag' => 'required|string',
        ]);

        $news = News::where('tag_new', 'LIKE', "%{$request->tag}%")->paginate(6);
        return view('pages.news', compact('news'));
    }

    public function latestNews()
    {
        return News::orderBy('fec_pub_new', 'desc')->take(3)->get();
    }

    public function getSidebarTags()
    {
        $allTags = News::all()->pluck('tag_new')->toArray();
        return collect($allTags)
            ->flatMap(function ($tags) {
                return explode(',', $tags);
            })
            ->unique()
            ->shuffle() // Mezcla aleatoriamente
            ->take(7) // Selecciona 7 tags aleatorios
            ->values()
            ->all();
    }
}
