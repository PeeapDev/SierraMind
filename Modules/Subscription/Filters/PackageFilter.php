<?php
/**
 * @package PackageFilter

 */

namespace Modules\Subscription\Filters;

use App\Filters\Filter;

class PackageFilter extends Filter
{
    /**
     * set the rules of query string
     *
     * @var array
     */
    protected $filterRules = [
        'status' => 'in:Active,Inactive,Pending'
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
                $query->WhereLike('name', $value)
                ->OrWhereLike('code', $value)
                ->OrWhereLike('sale_price', $value)
                ->OrWhereLike('discount_price', $value)
                ->OrWhereLike('billing_cycle', $value)
                ->OrWhereLike('status', $value)
                ->orWhereHas('user', function ($query)use($value) {
                    $query->WhereLike('name', $value);
                });
            });
        }

    }
}
