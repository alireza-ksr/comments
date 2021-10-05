<?php

namespace App\Http\Controllers;

use App\Models\Post;
//use Dotenv\Validator;
use App\Rules\Uppercase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorePost;
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
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
//        $validate=$request->validated();
//        dd($validate);
//        $request->validate([
//            'title'=>['required',new Uppercase()]
//            ]);

//        ]);  $request->validate([
//            'title'=>'required|min:6',
//            'user'=>'required',
//            'image'=>'file|size:512|mimes:jpg,png',
//
//        ]);
//        $validator=Validator::make($request->all(),[
//            'title'=>'required|min:5',
//            'user'=>'required',
//            'image'=>'file|size:512|mimes:jpg,png',
//        ]);
//        if ($validator->fails()){
//            return redirect()->back()->withErrors($validator);
//        }
        $fileName=time().'.'.$request->image->extension();
       $request->image->move(public_path('upload'),$fileName);

//        Post::create($request->file('image'));
        Post::create($request->all());
        return redirect()->route('post.index')->with('success', 'record created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        return view('post.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        return redirect()->route('post.e dit', ['post' => $id])->with('success', 'record edit successfully');
        $post= Post::find($id);
        return view('post.edit' , ["post" => $post]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('success', 'record deleted successfully');

    }
}
