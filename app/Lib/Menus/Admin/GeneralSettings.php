<?php

/**
 * @package Admin sidebar general setting menu
* @author Mohamed <dev@peeap.com>
 * @contributor Sabbi <[dev@peeap.com]>
 * @contributor  Mamun <[dev@peeap.com]>
 * @created 20-05-2024
 * @modified 04-10-2024
 */

namespace App\Lib\Menus\Admin;

use App\Models\Permission;
use Illuminate\Support\Facades\{
    Auth,
    Route
};
use Modules\Addons\Entities\Addon;

class GeneralSettings
{

    /**
     * Get menu items
     *
     * @return array
     */
    public static function get(): array
    {
        $prms = Permission::getAuthUserPermission(optional(Auth::user())->id);
        $items = [
            [
                'label' => __('System Setup'),
                'name' => 'system_setup',
                'href' => route('companyDetails.setting'),
                'position' => '10',
                'visibility' => in_array('App\Http\Controllers\CompanySettingController@index', $prms),
            ],
            [
                'label' => __('Preference'),
                'name' => 'preference',
                'href' => route('preferences.index'),
                'position' => '20',
                'visibility' => in_array('App\Http\Controllers\PreferenceController@index', $prms),
            ],
            [
                'label' => __('Maintenance Mode'),
                'name' => 'maintenance',
                'href' => route('maintenance.enable'),
                'position' => '30',
                'visibility' => in_array('App\Http\Controllers\MaintenanceModeController@enable', $prms),
            ],
            [
                'label' => __('Language'),
                'name' => 'language',
                'href' => route('language.index'),
                'position' => '40',
                'visibility' => in_array('App\Http\Controllers\LanguageController@index', $prms),
            ],
            [
                'label' => __('GDPR'),
                'name' => 'gdpr-config',
                'href' => Route::has('gdpr.config') ? route('gdpr.config') : '#',
                'position' => '50',
                'visibility' => Addon::findByAlias('gdpr')?->isEnabled() && in_array('Modules\Gdpr\Http\Controllers\GdprController@create', $prms),
            ],
            [
                'label' => __('Redirect Link'),
                'name' => 'redirect_link',
                'href' => route('setting.setRedirectLink'),
                'position' => '60',
                'visibility' => in_array('App\Http\Controllers\CompanySettingController@setRedirectLink', $prms),
            ],
        ];

        // Sort items based on position, placing items without a position at the beginning
        usort($items, function ($a, $b) {
            $positionA = isset($a['position']) ? $a['position'] : -1;
            $positionB = isset($b['position']) ? $b['position'] : -1;

            return $positionA <=> $positionB;
        });

        return $items;
    }
}
