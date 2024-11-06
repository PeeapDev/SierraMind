<?php
/**
 * @package ContentFilter
 * @author Peeap <pay.peeap@gmail.com>
 * @contributor Mohamed <pay.peeap@gmail.com>
 * @created 26-09-2024
 */

namespace Modules\OpenAI\Filters\v2;

use App\Filters\Filter;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class HistoryFilter extends Filter
{
    /**
     * Filter by search query string
     *
     * @param  string  $value
     * @return EloquentBuilder|QueryBuilder
     */
    public function search($value)
    {
        $value = gettype($value) == 'array' ? $value['value'] : $value;
        $value = xss_clean($value);

        return $this->query->where(function ($query) use ($value) {
            $query->whereLike('title', $value)->orWhereLike('type', $value);
        });
        
      
    }
}
