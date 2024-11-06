<?php
/**
 * @package CheckDefaultTimeZone
* @author Mohamed <dev@peeap.com>
 * @contributor Sabbi <[dev@peeap.com]>
 * @contributor  Mamun <[dev@peeap.com]>
 * @created 20-05-2024
 * @modified 04-10-2024
 */
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckDefaultTimeZone implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

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
        $mergeTimeZone = [];
        foreach (timeZoneList() as $time) {
            $mergeTimeZone[] = $time['zone'];
        }
        return in_array($value, $mergeTimeZone);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('The selected :x is invalid.', ['x' => __('Timezone')]);
    }
}
