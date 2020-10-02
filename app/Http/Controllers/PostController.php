<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;
use Image;
use Auth;


class PostController extends Controller
{
   /* public function all_post()
    {
        $posts = Post::with('user','category')->get();
        return $posts; //for fetch post with user and category data
    } */
    
   /* public function all_post()
    {
        $category = Category::all();
        foreach ($category as $cat) {
            return $cat->posts;
        } //for fetch single post mached by category id
    }*/
    public function all_post()
    {
        //$category = Category::with('posts')->get();
        //return $category;//give all category with post information 
        $posts = Post::with('user','category')->orderBy('id','desc')->get();
        return response()->json([
            'posts' =>$posts
        ],200);
    }
    public function savePost(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:2|max:50',
            'description' => 'required|min:2|max:1000',
            
        ]);
        $strpos = strpos($request->photo, ';');
        $sub = substr($request->photo, 0, $strpos);
        $ex = explode('/', $sub)[1];
        $name = time() . "." . $ex;
        $img = Image::make($request->photo)->resize(870, 350);
        $upload_path = public_path() . "/uploadimage/";
        $img->save($upload_path . $name);
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->cat_id = $request->cat_id;
        $post->user_id = Auth::user()->id;
        $post->photo = $name;
        $post->save();
    }
    public function editPost( $id )
    {
        $post = Post::find($id);
        return response()->json([
            'post' => $post
        ], 200);
    }
    public function deletePost($id)
    {
        $post = Post::find($id);
        $image_path = public_path() . "/uploadimage/";
        $image = $image_path . $post->photo;
        if (file_exists($image)) {
            @unlink($image);
        }
        $post->delete();
    }
    public function updatePost(Request $request,$id)
    {
        $post = Post::find($id);
        $this->validate($request, [
            'title' => 'required|min:2|max:50',
            'description' => 'required|min:2|max:1000'
        ]);


        if ($request->photo != $post->photo) {
            $strpos = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $strpos);
            $ex = explode('/', $sub)[1];
            $name = time() . "." . $ex;
            $img = Image::make($request->photo)->resize(870, 350);
            $upload_path = public_path() . "/uploadimage/";
            $image = $upload_path . $post->photo;
            $img->save($upload_path . $name);

            if (file_exists($image)) {
                @unlink($image);
            }
        } else {
            $name = $post->photo;
        }

        $post->title = $request->title;
        $post->description = $request->description;
        $post->cat_id = $request->cat_id;
        $post->user_id = Auth::user()->id;
        $post->photo = $name;
        $post->save();
    }

}
