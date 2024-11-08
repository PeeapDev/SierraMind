<?php
/**
 * @package PackageSubscriptionFilter

 */

namespace Modules\Subscription\Filters;

use App\Filters\Filter;

class PackageSubscriptionFilter extends Filter
{
    /**
     * set the rules of query string
     *
     * @var array
     */
    protected $filterRules = [
        'status' => 'in:Active,Pending,Inactive,Expired,Cancel'
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
        $value = xss_clean($value['value']);
        if (!empty($value)) {
            return $this->query->where(function ($query) use ($value) {
                $query->WhereLike('billing_cycle', $value)
                ->OrWhereLike('payment_status', $value)
                ->OrWhereLike('activation_date', $value)
                ->OrWhereLike('next_billing_date', $value)
                ->OrWhereLike('package_subscriptions.status', $value)
                ->orWhereHas('package', function ($query)use($value) {
                    $query->WhereLike('name', $value);
                })
                ->orWhereHas('user', function ($query) use ($value) {
                    $query->WhereLike('name', $value);
                });
            });
        }

    }
}
