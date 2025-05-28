<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VirusScan
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->hasFile('file')) {
            $validator = Validator::make($request->all(), [
                'file' => ['clamav'],
            ]);

            if ($validator->fails()) {
                return back()->withErrors(['file' => 'File appears to be infected with a virus.'])->withInput();
            }
        }

        return $next($request);
    }
}

