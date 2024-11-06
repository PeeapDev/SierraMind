<?php

/**
 * @package Paypal recurring view
*@author peeap <kabiacentral@gmail.com>
 * @contributor peeap <[kabiacentral@gmail.com]>
 * @created 25-05-2024
 */

namespace Modules\PaypalRecurring\Views;

use Modules\Gateway\Contracts\PaymentViewInterface;
use Modules\Gateway\Services\GatewayHelper;
use Modules\Gateway\Traits\ApiResponse;
use Modules\PaypalRecurring\Entities\PaypalRecurring;

class PaypalRecurringView implements PaymentViewInterface
{
    use ApiResponse;

    /**
     * Paypal recurring payment view
     *
     * @param String $key
     * @return view|redirectResponse
     */
    public static function paymentView($key)
    {
        $helper = GatewayHelper::getInstance();
        try {
            $paypalRecurring = PaypalRecurring::firstWhere('alias', 'paypalrecurring')->data;

            return view('paypalrecurring::pay', [
                'secretKey' => $paypalRecurring->secretKey,
                'clientId' => $paypalRecurring->clientId,
                'instruction' => $paypalRecurring->instruction,
                'purchaseData' => $helper->getPurchaseData($key)
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => __('Data not found.')]);
        }
    }

    /**
     * Paypal recurring payment response
     *
     * @param String $key
     * @return Array
     */
    public static function paymentResponse($key)
    {
        $helper = GatewayHelper::getInstance();

        $paypalRecurring = PaypalRecurring::firstWhere('alias', 'paypalrecurring')->data;
        return [
            'secretKey' => $paypalRecurring->secretKey,
            'clientId' => $paypalRecurring->clientId,
            'instruction' => $paypalRecurring->instruction,
            'purchaseData' => $helper->getPurchaseData($key)
        ];
    }
}
