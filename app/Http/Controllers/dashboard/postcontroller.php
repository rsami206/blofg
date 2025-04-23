<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class postcontroller extends Controller
{
    public function index() {

        $posts= Auth::user()->posts;
    //     $user_id = Auth::user()->id;
    //    // dd($user_id);
        
    //     $posts = Post::where("user_id", $user_id)->get();

        //dd($posts);

        return view("dashboard.posts.posts", ['posts' => $posts]);
    }
    public function postcreate(){
        return view('dashboard.posts.create');
       }
       public function poststore(Request $request){
// dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'Excerpt'=>'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        // post create
         // upload image
         $path = $request->file('image')->store("uploads", "public");

          // store data into db
        Post::create([
            'title' => $request->input('title'),
            'Excerpt'=>$request->input('Excerpt'),
            'content' => $request->input('content'),
            'photo_path' => $path,
            "user_id" => Auth::user()->id,
        

        ]);
        return redirect()->route('post.index')->with('success', 'Post created successfully!');
       }
}
