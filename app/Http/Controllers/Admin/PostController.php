<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['Posts'] = Post::with('Category')->get();
        return Inertia::render('Post/Index', $data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['Categories'] = Category::all();
        return Inertia::render('Post/Create', $data); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'slug'=>'required|unique:posts',
            'description'=>'required'
        ]);

        if ($request->hasFile('image_file')) {
            $request['image'] = $request->file('image_file')->store('posts');
        }

        if (empty($request->is_featured)) {
            $request['is_featured'] = 0;
        }

        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['Post'] = Post::find($id);
        $data['Categories'] = Category::all();
        return Inertia::render('Post/Edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'slug'=>'required',
            'description'=>'required'
        ]);
        $Post = Post::find($id);

        if ($request->hasFile('image_file')) {
            if ($Post->image) {
                Storage::delete($Post->image);
            }    
            $request['image'] = $request->file('image_file')->store('posts');
        }

        $Post->update($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Post = Post::find($id);

        if ($Post->image) {
            Storage::delete($Post->image);
        }

        $Post->delete();
        return redirect()->route('posts.index');
    }
}
