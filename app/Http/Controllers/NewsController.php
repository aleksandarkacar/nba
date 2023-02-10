<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Team;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::with('user')->paginate(10);
        foreach($news as $article){
            if (strlen($article->content) > 20)
                $article->contnet = substr($article->content, 0, 7) . '...';
        }

        return view('news', compact('news'));
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
            'title' => 'required|min:5|max:100',
            'content' => 'required|min:5|max:5000',
            'teams' => 'required|array'
        ]);
        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;
        
        $news->user()->associate(Auth::user())->save();
        $news->teams()->sync($request->teams);

        return redirect('/news')->with('status', 'News Sucessfuly Created!');
    //     if(isset($request['teams'])){
    //         if (is_array([$request['teams']])) {
    //              foreach($request['teams'] as $value){
    //                 echo $value;
    //              }
    //           } else {
    //             $value = $request['teams'];
    //             echo $value;
    //        }
    //    }
    //    return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $new = News::with('teams')->find($id);
        return view('new', compact('new'));
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

    public function filter($name){
        $team = Team::where('name', $name)->with('news')->first();
        $news = News::whereHas('teams', function($q) use ($team) {
            $q->whereIn('teams.id', [$team->id]);
        })->paginate(10);

            // SELECT
            //      count(*) AS aggregate
            // FROM
            //      `News`
            // WHERE
            //  EXISTS (
            //   SELECT
            //     *
            //   FROM
            //     `teams`
            //      INNER JOIN `news_teams` ON `teams`.`id` = `news_teams`.`team_id`
            //   WHERE
            //     `News`.`id` = `news_teams`.`news_id`
            //   AND `teams`.`id` IN (1)
            // )


        return view('news', compact('news'));
    }
}
