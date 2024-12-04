<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAvailability
{
/**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request 
     * @param  \Closure 
     * @param  string  
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $model)
    {
        $modelClass = '\\App\\Models\\' . ucfirst($model);

        if (!class_exists($modelClass)) {
            abort(404, "Model $model not found.");
        }
        $item = $modelClass::find($request->route('id'));

        if (!$item || $item->availability_status != 1) {
            if (!$item || $item->availability_status != 1) {
                $redirectRoute = 'home'; 
        
                if ($model === 'Event') {
                    $redirectRoute = 'events'; 
                } elseif ($model === 'Movie') {
                    $redirectRoute = 'movies'; 
                } elseif ($model === 'Sport') {
                    $redirectRoute = 'sports';
                }
        
                return redirect()->route($redirectRoute)
                    ->with('error', ucfirst($model) . ' is not available.');
            }
        }

        return $next($request);
    }
}
