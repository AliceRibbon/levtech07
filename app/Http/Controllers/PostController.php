<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest; //useする

class PostController extends Controller
{
    /**
 * Post一覧を表示する
 * 
 * @param Post Postモデル
 * @return array Postモデルリスト
 */
    public function index(Post $post)
    {
      return view('posts/index')->with(['posts' => $post -> getByLimit()]);
    }
    
    public function show(Post $post)
    {
      return view('posts/show')->with (['post' => $post]);
    
    }
    
    public function create()
    {
      return view('posts/create');
    }
    
    public function store(Request $request, Post $post)
    {
      $input = $request['post'];
      $post->fill($input)->save();
      return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
      return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
      $input_post = $request['post'];
      $post->fill($input_post)->save();
      
      return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
      $post->delete();
      return redirect('/');
    }

}
?>
