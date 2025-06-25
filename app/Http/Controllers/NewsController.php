<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news=News::with('categories')->get();
        return view('news.index',compact('news'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category=Category::get();
        return view('news.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $news= News::create([
            'title'=>$request->title,
            'content'=>$request->content
        ]);
        $news->categories()->attach($request->category_id);
        return redirect()->route('news');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
