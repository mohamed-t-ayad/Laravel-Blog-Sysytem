<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // make these controller accessed bu auth only
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::orderBy('created_At' , 'DESC')->get();
        return view('posts.index')->with('posts',$posts);
    }
    public function postsTrashed()
    {
        $posts = Post::onlyTrashed()->where('user_id', Auth::id())->get();

        return view('posts.trashed')->with('posts',$posts);
    }

    public function create()
    {
        $tags = Tag::all();
        if($tags->count() == 0) {
            return redirect()->route('tag.create');
        }
        return view('posts.create')->with('tags',$tags);
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'title' => 'required',
            'content' => 'required',
            'photo' => 'required|image',
            'tags' => 'required'
        ]);

        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/posts',$newPhoto);

        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
            'photo' => 'uploads/posts/'.$newPhoto,
            'slug' => str_slug($request->title),
        ]);
        $post->tags()->attach($request->tags);
        return redirect()->back();
    }

    public function show($slug)
    {
        $tags = Tag::all();
        $post = Post::where('slug' , $slug)->first();
        return view('posts.show')->with('post',$post)->with('tags',$tags);
    }

    public function edit($id)
    {
        $tags = Tag::all();
        //$post = Post::find($id);
        $post = Post::where('id',$id)->where('user_id',Auth::id())->first();
        if($post == null) {
            return redirect()->back()->with(['message'=> 'You Can only see members Posts']);
        }
        return view('posts.edit')->with('post',$post)->with('tags',$tags);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $this->validate($request , [
            'title' => 'required',
            'content' => 'required',
        ]);
        if($request->has('photo')) {
            $photo    = $request->photo;
            $newPhoto = time().$photo->getClientOriginalName();
            $photo->move('uploads/posts',$newPhoto);
            $post->photo = 'uploads/posts/'.$newPhoto;
        }
        $post->title   = $request->title;
        $post->content = $request->content;
        $post->save();
        $post->tag()->sync($request->tags);
        return redirect()->route('posts.index')->with(['success' => 'Post updated.']);
    }

    public function destroy($id)
    {
        //$post = Post::find($id);
        $post= Post::where('id',$id)->where('user_id',Auth::id())->first();
        if($post == null) {
            return redirect()->back()->with(['message'=> 'You Can only see members Posts']);
        }
        $post->delete($id);
        return redirect()->back();
    }
    public function hdelete($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        return redirect()->back();
    }
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        return redirect()->back()->with(['success'=> 'Post has been restored.']);
    }
}
