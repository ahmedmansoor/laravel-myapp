<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = post::all();
        // $sample = User::where('name', "Ahmed Mansoor")->first();
        // return $sample;
        $posts = post::where('user_id', Auth()->user()->id)->get();
        return view('createpost')->with('posts', $posts);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $filenamewithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        $path = $request->file('image')->storeAs('public/postfolder', $fileNameToStore);


        $post = new post();
        $post->name = $request->input('postname');
        $post->user_id =  Auth()->user()->id;
        $post->detail = $request->input('detail');
        $post->image = $fileNameToStore;

        $post->save();


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return ($id);
        $post = post::find($id);
        return view('postdetails')->with('post', $post);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $mansoor)
    {
        $post = post::find($id);
        return view('editpost')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {

        $post = post::find($request->input('id'));
        $post->name = $request->input('postname');
        $post->user_id =  Auth()->user()->id;
        $post->detail = $request->input('detail');
        $post->image = "fileNameToStore";

        $post->save();


        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //
    }
}