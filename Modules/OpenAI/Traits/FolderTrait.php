<?php

/**
 * @package FolderTrait

 */

namespace Modules\OpenAI\Traits;

trait FolderTrait
{
    /**
     * Get data
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        $val = parent::__get($name);

        if ($val <> null) {
            return $val;
        }

        $data = $this->metaData()->where('key', $name)->first();

        if ($data) {
            return $data->value;
        }
    }
}
