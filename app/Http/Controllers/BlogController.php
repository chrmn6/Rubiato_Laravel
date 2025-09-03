<?php

namespace App\Http\Controllers;
use App\Models\Blog;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // display all blogs details and content
        $blogs = Blog::latest()->get();
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // display the create routings
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // insert all the data
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . preg_replace('/\s+/', '.', $file->getClientOriginalName());
            $file->move(public_path('uploads'), $imageName);
        }

        Blog::create([
            'title' => $request->title,
            'content' => $request->input('content'),
            'image' => $imageName ?? null,
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
        return view('blogs.create');
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
    public function edit(Blog $blog)
    {
        // edit page na makita sa routing
        return view('blogs.update', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        // update the content of the blog
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = $blog->image;

        if ($request->hasFile('image')) {
            //delete the old image
            if ($imageName && file_exists(public_path('uploads/' . $imageName))) {
                unlink(public_path('uploads/' . $imageName));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
        }
        ;

        $blog->update([
            'title' => $request->title,
            'content' => $request->input('content'),
            'image' => $imageName,
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        // delete blogs
        if ($blog->image && file_exists(public_path('uploads/' . $blog->image))) {
            unlink(public_path('uploads/' . $blog->image));
        }
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
