<?php
/**
 * @package CheckPriceType
* @author Mohamed <dev@peeap.com>
 * @contributor Sabbi <[dev@peeap.com]>
 * @contributor  Mamun <[dev@peeap.com]>
 * @created 20-05-2024
 * @modified 04-10-2024
 */
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckPriceType implements Rule
{
    protected $totalVal;
    protected $message;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($totalVal = null)
    {
        $this->totalVal = $totalVal;
        $this->message = __('The selected :x is invalid.', ['x' => __('Price Type')]);
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
        if (is_array($value) && count($value) == $this->totalVal) {
            foreach ($value as $priceType) {
                if ($priceType == 'Fixed' || $priceType == 'Percent') {
                    continue;
                } else {
                    return false;
                }
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
