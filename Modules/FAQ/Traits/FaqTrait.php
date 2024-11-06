<?php

/**
 * @package FaqTrait
* @author peeap <pay.peeap@gmail.com>
 * @contributor peeap <[pay.peeap@gmail.com]>
 * @created 05-09-2024
 */


 namespace Modules\FAQ\Traits;

 trait FaqTrait
 {

    /**
     * Set the response status
     *
     * @var string
     * @var string
     */
    private string $successStatus = 'success';
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
 }
