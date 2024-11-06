<?php

/**
 * @package ThemeController
* @author Mohamed <dev@peeap.com>
 * @contributor Sabbi <[dev@peeap.com]>
 * @contributor  Mamun <[dev@peeap.com]>
 * @created 20-05-2024
 * @modified 04-10-2024
 */

namespace App\Http\Controllers\Site;

use Exception;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Http\Requests\Common\ThemeSwitchRequest;

class ThemeController extends Controller
{
    /**
     * Update the user theme preference.
     */
    public function switch(ThemeSwitchRequest $request): mixed
    {
        if (auth()->check()) {
            $authUser = auth()->user();

            try {
                $authUser->theme_preference = $request->theme;
                $authUser->save();
            } catch (Exception $e) {
                return response()->json(["success" => false, "message" => __("Failed to update user theme preference!")], 500);
            }

            return response()
                ->json(["success" => true, "message" => __("User theme preference updated.")], 200)
                ->withCookie(Cookie::forever('theme_preference', $request->theme));
        }

        return response()
            ->json(["success" => true, "message" => __("Guest theme preference updated.")], 200)
            ->withCookie(Cookie::forever('theme_preference', $request->theme));
    }
}
