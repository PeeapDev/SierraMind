<?php

/**
 * @package Paypal recurring

 */

namespace Modules\PaypalRecurring\Entities;

use Modules\Gateway\Entities\GatewayBody;

class PaypalRecurringBody extends GatewayBody
{
    /**
     * Paypal recurring Secret key
     *
     * @var string
     */
    public $secretKey;

    /**
     * Paypal recurring client 
     *
     * @var string
     */
    public $clientId;

    /**
     * Paypal payment instruction
     *
     * @var string
     */
    public $instruction;

    /**
     * Paypal recurring status
     *
     * @var string
     */
    public $status;

    /**
     * Paypal recurring sandbox or live status
     *
     * @var string
     */
    public $sandbox;

    /**
     * Constructor for paypal recurring body
     *
     * @param array|object $request
     * @return void
     */
    public function __construct($request)
    {
        $this->secretKey = $request->secretKey;
        $this->clientId = $request->clientId;
        $this->instruction = $request->instruction;
        $this->sandbox = $request->sandbox;
        $this->status = $request->status;
    }
}
