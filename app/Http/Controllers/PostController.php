<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use Brian2694\Toastr\Facades\Toastr;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'author' => 'required|min:2|max:15',
            'tag' => 'required',
            'description' => 'required',
        ]);
        $post = new Post;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->tag = $request->tag;
        $post->description = $request->description;
        $post->save();

        if ($post->save()) {
            $notification=array(
                'message' => 'Post added successfully',
                'alert-type' => 'success' 
            ); 
            return redirect()->back()->with($notification);
        }else{
            return redirect()->back();
        }
    }
    public function AllPost()
    {
        $post = Post::all();
        return view('allpost')->with('post',$post);
    }
    public function Delete($id)
    {
        $post = Post::find($id);
        $delete=$post->delete();
        if ($delete) {
            $notification=array(
                'message' => 'Post Delete successfully',
                'alert-type' => 'info' 
            ); 
            return redirect()->back()->with($notification);
        }else{
            return redirect()->back();
        }
    }
    public function Edit($id)
    {
        $post=Post::findorfail($id);
        return view('editpost',compact('post'));
    }
    public function Update(Request $request,$id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|min:2|max:15',
            'tag' => 'required',
            'description' => 'required',
        ]);
        $post = Post::findorfail($id);
        $post->title = $request->title; 
        $post->author = $request->author;
        $post->tag = $request->tag;
        $post->description = $request->description;
        $updates = $post->save();
        
        if ($updates) {
            $notification=array(
                'message' => 'Post updates successfully',
                'alert-type' => 'success' 
            ); 
            return redirect()->route('home')->with($notification);
        }else{
            return redirect()->back();
        }
    }
}
