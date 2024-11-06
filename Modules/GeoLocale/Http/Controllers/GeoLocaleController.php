<?php

/**
 * @package GeoLocaleController
* @author peeap <pay.peeap@gmail.com>
 * @contributor Mohamed <[pay.peeap@gmail.com]>
 * @created 05-09-2024
 */


namespace Modules\GeoLocale\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\GeoLocale\Entities\Country;
use Modules\GeoLocale\Http\Resources\AjaxSelectSearchResource;

class GeoLocaleController extends Controller
{

    /**
     * Country List
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('geolocale::index');
    }
}
