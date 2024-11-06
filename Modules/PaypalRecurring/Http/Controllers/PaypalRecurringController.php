<?php

/**
 * @package Paypal recurring Controller

 */

namespace Modules\PaypalRecurring\Http\Controllers;

use Modules\PaypalRecurring\Http\Requests\PaypalRecurringRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Addons\Entities\Addon;
use Modules\PaypalRecurring\Entities\{
    PaypalRecurring,
    PaypalRecurringBody
};

class PaypalRecurringController extends Controller
{

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(PaypalRecurringRequest $request)
    {
        $paypalBody = new PaypalRecurringBody($request);

        PaypalRecurring::updateOrCreate(
            ['alias' => moduleConfig('paypalrecurring.alias')],
            [
                'name' => moduleConfig('paypalrecurring.name'),
                'instruction' => $request->instruction,
                'status' => $request->status,
                'sandbox' => $request->sandbox,
                'image' => 'thumbnail.png',
                'data' => json_encode($paypalBody)
            ]
        );

        return back()->with(['AddonStatus' => 'success', 'AddonMessage' => __('Paypal recurring settings updated.')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Renderable
     */
    public function edit()
    {
        try {
            $module = PaypalRecurring::first()->data;
        } catch (\Exception $e) {
            $module = null;
        }
        $addon = Addon::findOrFail('paypalrecurring');

        return response()->json(
            [
                'html' => view('gateway::partial.form', compact('module', 'addon'))->render(),
                'status' => true
            ],
            200
        );
    }
}
