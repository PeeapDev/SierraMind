<?php
/**
 * @package UserFilter
* @author Mohamed <dev@peeap.com>
 * @contributor Sabbi <[dev@peeap.com]>
 * @contributor  Mamun <[dev@peeap.com]>
 * @created 20-05-2024
 * @modified 04-10-2024
 */

namespace App\Filters;

use App\Filters\Filter;

class UserFilter extends Filter
{
    /**
     * set the rules of query string
     *
     * @var array
     */
    protected $filterRules = [
        'status' => 'in:Active,Inactive,Pending,Deleted',
        'role' => 'int'
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
     * filter by role query string
     *
     * @param int $id
     * @return void
     */
    public function role($id)
    {
        return $this->query->whereHas('roleUser', function ($query) use ($id){
            $query->where('role_id', $id);
        });
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

        return $this->query->where(function ($query) use ($value) {
            $query->whereLike('name', $value)
                ->OrWhereLike('email', $value)
                ->OrWhereLike('created_at', $value)
                ->OrWhereLike('status', $value);
        });
    }
}
