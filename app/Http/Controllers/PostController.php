<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Subforum;
use App\Models\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Subforum $subforum)
    {
        return view('posts.create' , ['subforum' => $subforum]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:1000',
            'image' => 'mimes:jpg,png,jpeg|max:5048',
            'user_id' => 'required|integer',
            'subforum_id' => 'required|integer',
        ]);

        // dd($validatedData['title']);

        $p = new Post;
        $p->title = $validatedData['title'];
        $p->content = $validatedData['content'];
        $p->user_id = $validatedData['user_id'];
        $p->subforum_id = $validatedData['subforum_id'];
        $p->save();

        //dd($p);

        if (isset($validatedData['image'])) {
            $newImageName = time() . '-' . $validatedData['title'] . '.' . $validatedData['image']->extension();

            // dd($newImageName);

            $request->image->move(public_path('images'), $newImageName);
            

            $i = new Image;
            $i->image_path = $newImageName;
            $i->post_id = $p->id;
            $i->save();
        }

        session()->flash('message', 'Post was created.');

        return redirect()->route('subforums.show', ['subforum'=> $validatedData['subforum_id']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Subforum $subforum, Post $post)
    {
        // dd($post);
        return view('posts.show', ['subforum' => $subforum, 'post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subforum $subforum, Post $post)
    {
        return view('posts.edit', ['subforum' => $subforum, 'post' => $post]);
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
        $post = Post::find($id);
        //dd($post);
        
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:1000',
        ]);

        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->update();

        // $post->fill($request->post())->save();

        // $affected = DB::table('posts')
        //     ->where('id', $post->id)
        //     ->update(['title' => $request['title'], 'content' => $request['content']]);

        // dd($affected);
        
        // $affected->save();

        return redirect()->route('subforum.posts.show', ['subforum'=>$post->subforum_id, 'post'=>$post]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subforum $subforum, Post $post)
    {
        $post->delete();

        return redirect()->route('subforums.show', ['subforum'=>$subforum]);
        //->with('message', 'Post was deleted.')
    }
}
