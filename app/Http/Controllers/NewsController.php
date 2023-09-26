<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        if (!empty($search)) {
            $data = News::where('news', 'like', '%' . $search . '%')->paginate(5);
        } else {
            $data = News::paginate(5);
        }

        $profiles = Profile::all();
        $newslist = News::all();

        return view('dashboard.news_crud', [
            'news' => $data,
            'search' => $search,
            'newslist' => $newslist,
            'profiles' => $profiles,
        ]);
    }


    public function create()
    {
        return view('dashboard.news.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);
        $image = $request->file('image');
        $image->storeAs('public/new_images', $image->hashName());

        News::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image->hashName(),
        ]);

        return redirect()->route('dashboard.news_crud')->with('success', 'News successfully added.');
    }


    public function showReadMore($id)
{
    $nw = News::findOrFail($id);
    return view('dashboard.readmore.readmore', compact('nw'));
}


    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('dashboard.news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image',
        ]);

        $news = News::findOrFail($id);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete('new_images/' . $news->image);

            $newImagePath = $request->file('image')->store('public/new_images');
            $validatedData['image'] = basename($newImagePath);
        }

        $news->update($validatedData);

        return redirect()->route('dashboard.news_crud')->with('success', 'News successfully updated.');
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('dashboard.news_crud')->with('success', "News successfully deleted!");
    }
}
