<?php

namespace Fschirinzi\LaraMote\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Gate;

class EnsureUserIsAuthorized
{
    /**
     * Ensures the user is authorized to use the LaraMote endpoints.
     *
     * @param  Request     $request
     * @param  Closure     $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $allowed = app()->environment(config('laramote.allowed_environments'))
            || Gate::allows('useLaraMote', [$request->user()]);

        abort_unless($allowed, 403);

        return $next($request);
    }
}
