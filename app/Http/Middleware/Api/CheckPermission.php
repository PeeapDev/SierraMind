<?php
/**
 * @package CheckPermission
* @author Mohamed <dev@peeap.com>
 * @contributor Sabbi <[dev@peeap.com]>
 * @contributor  Mamun <[dev@peeap.com]>
 * @created 20-05-2024
 * @modified 04-10-2024
 */
namespace App\Http\Middleware\Api;

use Closure;

/**
 * Check user has the permission to see the records or not
 */
class CheckPermission
{
    /**
     *  Handle an incoming request.
     * @param Request $request
     * @param  Closure $next
     * @param string $permissions
     * @return json $data
     */
    public function handle($request, Closure $next)
    {
        if (!hasPermission()) {
            if ($request->is('api/v2/*')) {
                return response()->json([
                    'error' => __('You do not have permission to access these records.'),
                ], 403);
            }
            $data['status']  = ['code' => 403, 'text' => __('Forbidden')];
            $data['message'] = __('You do not have permission to access these records.');
            return response()->json(['response' => $data]);
        }
        return $next($request);
    }
}
