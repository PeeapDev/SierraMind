<?php
/**
 * @package Media Manager Model
 * @author Peeap <pay.peeap@gmail.com>
 * @contributor Mohamed <[dev.peeap@gmail.com]>
 * @created 05-09-2024
 */

namespace Modules\MediaManager\Http\Models;

use App\Models\Model;
use App\Traits\ModelTrait;
use Illuminate\Support\Facades\Log;
use App\Traits\ModelTraits\hasFiles;


class MediaManager extends Model
{
    use ModelTrait, hasFiles;

    /**
     * Table
     *
     * @var string
     */
    protected $table = 'object_files';

    /**
     * Timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Store uploadable files
     *
     * @param null|array $requestData
     * @return boolean
     */
    public function store($requestData = null) {
        try {

            $this->uploadFiles(['isUploaded' => false, 'isOriginalNameRequired' => true, 'isMediaManager' => true, 'thumbnail' => true]);

        } catch (\Exception $e) {

            Log::info($e->getMessage());

            return false;

        }

        return true;
    }


}
