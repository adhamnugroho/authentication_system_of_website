<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (auth()->user()->role != "Admin") {

            $status = session()->get('status');
            $message = session()->get('message');

            return redirect()->route('userDashboard')->with('status', $status)->with('message', $message);
        }

        return $next($request);
    }
}
