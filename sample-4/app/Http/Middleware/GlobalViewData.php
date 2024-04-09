<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\UserNotification;
class GlobalViewData
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


        $notifications = $noti = UserNotification::withCount('tickets')
        ->whereHas('ticket')
        ->where('admin',1)
        ->where('type','ticket')
        ->groupBy('relation_id')->orderBy('created_at','DESC');
 
        View::share(
           [ 
            'notifications' => $notifications->paginate(20),
            'notification_counts' => $noti->count()
            ]
        );
        return $next($request);
    }
}
