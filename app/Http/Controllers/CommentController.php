<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'team_id' => 'exists:teams,id',
            'content' => 'required|min:10|max:5000'
        ]);

        $comment = new Comment();
        $comment->content = $request->content;

        $comment->user_id = Auth::user()->id;
        $team = Team::find($request->team_id);

        $comment->user()->associate(Auth::user());
        $comment->team()->associate($team)->save();
        
        return redirect('team/'. $request->team_id, with('status', 'Comment Sucessfuly Posted!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
