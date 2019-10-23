<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        return view('posts.create', compact('post', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        if ($request->hasFile('file')){
            $path = $request->file('file')->store('uploads', 'public');
        }
        $item = Post::create([
            'name' => $request['name'],
            'content' => $request['content'],
            'category_id' => $request['category_id'],
            'file' => $path,
        ]);
        if ($item) {
            return redirect()->route('posts.index')->with(['success' => 'Дані успішно збережено.']);
        } else {
            return back()
                ->withErrors(['msg' => 'Помилка при збереженні.'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->load(['comments', 'category']);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        if ($request->hasFile('file')){
            $path = $request->file('file')->store('uploads', 'public');
            $result = $post->update([
                'name' => $request['name'],
                'content' => $request['content'],
                'category_id' => $request['category_id'],
                'file' => $path,
            ]);
        }
        $post->update($request->all());
        if (!empty($result)) {
            return redirect()->route('posts.index')->with(['success' => 'Дані успішно змінено.']);
        } else {
            return back()
                ->withErrors(['msg' => 'Помилка при зміненні даних.'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->comments()->delete();
        $post->delete();
        return redirect()->route('posts.index');
    }
}
