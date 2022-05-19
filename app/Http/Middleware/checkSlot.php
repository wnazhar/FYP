<?php

namespace App\Http\Middleware;

use Closure;
use App\Ads;
use App\Slots;
class checkSlot
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
        return Ads::where([['date',$request->input('date')],
            ['timeslot',$request->input('timeslot')]])->exists() ? 
            redirect('home'):$next($request);
    }
}
