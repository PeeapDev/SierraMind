<?php

/**
 * @package PlanCoupon Model
* @author peeap <pay.peeap@gmail.com>
 * @contributor Mohamed<[pay.peeap@gmail.com]>
 * @created 05-09-2024
 */


namespace Modules\Coupon\Http\Models;

use App\Models\Model;

class PlanCoupon extends Model
{
    /**
     * timestamps
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Table name
     * @var string
     */
    protected $table = 'plan_coupons';

    /**
     * Foreign key with Coupon model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coupon()
    {
        return $this->belongsTo('Modules\Coupon\Http\Models\Coupon', 'coupon_id');
    }

    /**
     * Foreign key with Package model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plan()
    {
        return $this->belongsTo('Modules\Subscription\Entities\Package', 'package_id');
    }
}
