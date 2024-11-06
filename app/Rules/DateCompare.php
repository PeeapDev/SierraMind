<?php
/**
 * @package DateCompare
* @author Mohamed <dev@peeap.com>
 * @contributor Sabbi <[dev@peeap.com]>
 * @contributor  Mamun <[dev@peeap.com]>
 * @created 20-05-2024
 * @modified 04-10-2024
 */
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DateCompare implements Rule
{
    protected $startDate;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return strtotime($this->startDate) <= strtotime($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return str_replace('xa', 'attribute', __('The :xa must be greater than or equal to start date.'));
    }
}
