<?php
/**
 * @package Country
* @author Mohamed <dev@peeap.com>
 * @contributor Sabbi <[dev@peeap.com]>
 * @contributor  Mamun <[dev@peeap.com]>
 * @created 20-05-2024
 * @modified 04-10-2024
 */

namespace App\Models;
use App\Models\Model;

class Country extends Model
{
    /**
     * timestamps
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Get Country
     * @param int $id
     * @return string
     */
    public static function getCountry($id = null)
    {
        $country = self::getAll()->where('id', $id)->first();
        return $country->name;
    }
}
