<?php
/**
 * @package CouponRedeemFilter
* @author peeap <pay.peeap@gmail.com>
 * @contributor Md. Al Mamun <[pay.peeap@gmail.com]>
 * @created 05-09-2024
 */

namespace Modules\Coupon\Filters;

use App\Filters\Filter;

class CouponRedeemFilter extends Filter
{
    /**
     * filter by search query string
     *
     * @param string $value
     * @return query builder
     */
    public function search($value)
    {
        $value = xss_clean($value['value']);
        if (!empty($value)) {
            return $this->query->where(function ($query) use ($value) {
                $query->WhereLike('coupon_code', $value)
                    ->orWhereLike('user_name', $value)
                    ->orWhereLike('discount_amount', $value);
            });
        }
    }
}
