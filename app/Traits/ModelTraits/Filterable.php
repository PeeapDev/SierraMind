<?php

/**
 * @package Filterable
* @author Mohamed <dev@peeap.com>
 * @contributor Sabbi <[dev@peeap.com]>
 * @contributor  Mamun <[dev@peeap.com]>
 * @created 20-05-2024
 * @modified 04-10-2024
 */

namespace App\Traits\ModelTraits;

use Illuminate\Database\Eloquent\Builder;
use App\Filters\Filter;
use ReflectionClass;
use Exception;

trait Filterable
{
    public function scopeFilter(Builder $query, $filterClass = null)
    {
        // Resolve the current Model's filter
        if ($filterClass === null) {

            $model = class_basename($this);

            // Get core model filter class
            $filterClass = 'App\\Filters\\' . $model . 'Filter';

            // Get module model filter class
            if (!class_exists($filterClass)) {

                // Ge model namespace
                $namespace = (new ReflectionClass(get_class($this)))->getNamespaceName();

                $module = explode('\\', $namespace);

                $filterClass = 'Modules\\' . $module[1] . '\\Filters\\' . $model . 'Filter';
            }

            if (!class_exists($filterClass)) {
                throw new Exception("{$model} filtering class not found.");
            }
        }

        if ($filterClass instanceof Filter) {
            return $filterClass->apply($query);
        }

        return (new $filterClass)->apply($query);
    }
}
