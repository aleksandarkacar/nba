<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HateChecker
{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $forbiddenWords = ['hate', 'idiot', 'stupid'];
        foreach ($forbiddenWords as $hateword)
        {
            if (stripos($request->content, $hateword) !== false){
                return redirect('teams/'. $request->team_id)->with('status', 'Comment contains banned words');
            }
        }
        return $next($request);
    }
}
