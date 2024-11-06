<?php

/**
 * @package Paypal recurring

 */

namespace Modules\PaypalRecurring\Entities;

use Modules\Gateway\Entities\Gateway;
use Modules\PaypalRecurring\Scope\PaypalRecurringScope;

class PaypalRecurring extends Gateway
{
    /**
     * Gateway table name
     *
     * @var string
     */
    protected $table = 'gateways';

    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $appends = ['image_url'];

    /**
     * Scope for paypal recurring
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new PaypalRecurringScope);
    }
}
