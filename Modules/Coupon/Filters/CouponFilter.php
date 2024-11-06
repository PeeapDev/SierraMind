<?php
/**
 * @package CouponFilter
* @author peeap <pay.peeap@gmail.com>
 * @contributor Md. Al Mamun <[pay.peeap@gmail.com]>
 * @created 05-09-2024
 */


namespace Modules\Coupon\Filters;

use App\Filters\Filter;

class CouponFilter extends Filter
{
    /**
     * set the rules of query string
     *
     * @var array
     */
    protected $filterRules = [
        'status' => 'in:Active,Inactive,Expired'
    ];

    /**
     * filter status  query string
     *
     * @param string $status
     * @return query builder
     */
    public function status($status)
    {
        return $this->query->where('status', $status);
    }

    /**
     * filter by search query string
     *
     * @param string $value
     * @return query builder
     */
    public function search($value)
    {
        $value = $value['value'];
        if (!empty($value)) {
            return $this->query->where(function ($query) use ($value) {
                $query->WhereLike('name', $value)
                    ->OrWhereLike('code', $value)
                    ->OrWhereLike('discount_type', $value)
                    ->OrWhereLike('discount_amount', $value)
                    ->OrWhereLike('status', $value);
            });
        }
    }
}
