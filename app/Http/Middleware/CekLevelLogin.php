<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\{Auth, Session};

class CekLevelLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$rules)
    {
        // $level = Session::get('levelbaru');
        // $level = Auth::user();
        // dd($level->level);
        // if ($level->level == $rules) {
        //     return $next($request);
        // }
        if (in_array($request->user()->level_user->nama_level, $rules)) {
            return $next($request);
        }
        return back()->with('warning', "Anda tidak dapat mengakses");
    }
}
