<?php
namespace App\Http\Middleware;
use Closure;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user() == null){
            return response()->json(['error' => 'You are Unauthorized.'], 403);
        }
        elseif(auth()->user()->role == 'admin'){
            return $next($request);
        }
   
        return redirect('home')->with('error',"Only admin can access!");
    }
}