<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;

class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $posts = Post::all();

    return view("admin.posts.index", compact("posts"));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view("admin.posts.create");
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // prendo i dati del form
    $data = $request->all();
    // validazione
    $request->validate([
      "title" => "required|string|max:100",
      "content" => "required|string",
      "published" => "sometimes|accepted",
    ]);
    // aggiorno la risorsa con i nuovi dati
    $newPost = new Post();
    $newPost->title = $data["title"];
    $newPost->slug = Str::slug($newPost->title, '-');
    $newPost->content = $data["content"];
    $newPost->published = isset($data["published"]);
    $newPost->save();
    // restituisco la pagina show della risorsa modificata
    return redirect()->route('posts.show', $newPost->id);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Post $post)
  {
    return view("admin.posts.show", compact("post"));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Post $post)
  {
    return view("admin.posts.edit", compact("post"));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Post $post)
  {
    $data = $request->all();
    // validazione
    $request->validate([
      "title" => "required|string|max:100",
      "content" => "required|string",
      "published" => "sometimes|accepted",
    ]);

    $post->title = $data["title"];
    $post->slug = Str::slug($post->title, '-');
    $post->content = $data["content"];
    $post->published = isset($data["published"]);
    $post->save();

    return redirect()->route('posts.show', $post->id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Post $post)
  {
    $post->delete();

    return redirect()->route("posts.index");
  }
}
