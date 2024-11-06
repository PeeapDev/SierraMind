<?php
/**
 * @package CurrencyController
 * @author Mohamed <dev@peeap.com>
 * @contributor Sabbi <[dev@peeap.com]>
 * @contributor  Mamun <[dev@peeap.com]>
 * @created 20-05-2024
 * @modified 04-10-2024
 */
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\AjaxCurrencyResource;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * currency List
     * @param Request $request
     * @return json $data
     */
    public function findCurrencyAjaxQuery(Request $request)
    {
        $currencies = Currency::select('id', 'name')
            ->where('name', 'LIKE', "%{$request->q}%")
            ->limit(10)->get();

        return AjaxCurrencyResource::collection($currencies);
    }
}
