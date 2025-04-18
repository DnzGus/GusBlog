<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
Use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.postCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();
        
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        
        $request->photo->storeAs('photos', $post->id.'.jpg', 'public');
        
        return redirect('/post/'.$post->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        $post = Post::find($id);
        $url = Storage::url($post->id.'.jpg');
        // dd($url);
        return view('post.postShow', compact('post','url'));
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
