<?php

/**
 * @package Permission middleware
* @author Mohamed <dev@peeap.com>
 * @contributor Sabbi <[dev@peeap.com]>
 * @contributor  Mamun <[dev@peeap.com]>
 * @created 20-05-2024
 * @modified 04-10-2024
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Route;

class Permission
{
    public function handle($request, Closure $next)
    {
        if (session('impersonator') && $request->segment(2) <> 'impersonate' && $request->segment(1) == 'admin') {
            Auth::onceUsingId(session('impersonator'));
        }
        if (!hasPermission()) {
            abort(403, __('Unauthorized! Go home, grow up and get authorization'));
        }

        return $next($request);
    }
}
