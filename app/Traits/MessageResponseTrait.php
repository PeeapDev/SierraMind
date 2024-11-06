<?php

/**
 * @package MessageResponseTrait
* @author Mohamed <dev@peeap.com>
 * @contributor Sabbi <[dev@peeap.com]>
 * @contributor  Mamun <[dev@peeap.com]>
 * @created 20-05-2024
 * @modified 04-10-2024
 */

namespace App\Traits;

trait MessageResponseTrait
{
    /**
     * Success Status
     */
    private string $successStatus = 'success';

    /**
     * Fail Status
     */
    private string $failStatus = 'fail';

    /**
     * Not found response
     *
     * @return array
     */
    protected function notFoundResponse(): array
    {
        return [
            'status' => $this->failStatus,
            'message' => __(':x does not exist.', ['x' => $this->service])
        ];
    }

    /**
     * Save success response
     *
     * @return array
     */
    protected function saveSuccessResponse(): array
    {
        return [
            'status' => $this->successStatus,
            'message' => __('The :x has been successfully saved.', ['x' => $this->service])
        ];
    }

    /**
     * Save fail response
     *
     * @return array
     */
    protected function saveFailResponse(): array
    {
        return [
            'status' => $this->failStatus,
            'message' => __('Failed to save :x, please try again.', ['x' => $this->service])
        ];
    }

    /**
     * Delete success response
     *
     * @return array
     */
    protected function deleteSuccessResponse(): array
    {
        return [
            'status' => $this->successStatus,
            'message' => __('The :x has been successfully deleted.', ['x' => $this->service])
        ];
    }

    /**
     * Delete fail response
     *
     * @return array
     */
    protected function deleteFailResponse(): array
    {
        return [
            'status' => $this->failStatus,
            'message' => __('Failed to delete :x, please try again.', ['x' => $this->service])
        ];
    }

     /**
     * Update success response
     *
     * @return array
     */
    protected function updateSuccessResponse(): array
    {
        return [
            'status' => $this->successStatus,
            'message' => __('The password has been successfully updated.')
        ];
    }

}
