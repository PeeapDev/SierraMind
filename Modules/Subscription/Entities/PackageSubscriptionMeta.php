<?php

/**
 * @package PackageSubscriptionMeta

 */

namespace Modules\Subscription\Entities;

use App\Models\MetaData;
use App\Traits\ModelTrait;

class PackageSubscriptionMeta extends MetaData
{
    use ModelTrait;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'package_subscriptions_meta';

    /**
     * timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Relation with packageSubscription model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function packageSubscription()
    {
        return $this->belongsTo(packageSubscription::class);
    }
}
