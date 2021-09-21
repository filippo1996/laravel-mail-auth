<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->get();
        //$posts = Post::all();
        //dd($posts->load('category'));

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        /* la facciamo direttamente sulla classe request StorePostRequest
        $data['slug'] = Str::slug($data['title'], '-');
        */

        $post = new Post();
        $post->fill($data);
        $save = $post->save();

        if(!$save){
            App::abort(500, 'Error');
        }

        if($request->has('tags')){
            $post->tags()->attach($data['tags']);
        }

        return redirect()->route('posts.show', $post->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        //$tags = Tag::all();
        $tags = Tag::pluck('name', 'id');
        //dd($tags);
        return view('admin.posts.edit', compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();
        //$data['slug'] = Str::slug($data['title'],'-');

        $post->tags()->sync($data['tags'] ?? []);

        /*
        if(isset($data['tags'])){

            $post->tags()->sync($data['tags']);

        } else{

            $post->tags()->sync([]);
        }
        */

        $post->update($data);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // siccome abbiamo impostato sulla tabella post_tag onDelete('cascade)
        // non serve inserire il metodo $user->tags()->detach([1, 2, 3]);
        // perchè verrano eliminati automaticamente dalla tabella quando si elimina un post
        $post->delete();

        return redirect()->route('posts.index');
    }
}
