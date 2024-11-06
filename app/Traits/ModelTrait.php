<?php

/**
 * @package FormattedDate
* @author Mohamed <dev@peeap.com>
 * @contributor Sabbi <[dev@peeap.com]>
 * @contributor  Mamun <[dev@peeap.com]>
 * @created 20-05-2024
 * @modified 04-10-2024
 */

namespace App\Traits;

use App\Traits\ModelTraits\{
    FormatDateTime,
    Cachable,
    EloquentHelper,
    Filterable
};


trait ModelTrait
{
    use FormatDateTime, Cachable, EloquentHelper, Filterable;
}
