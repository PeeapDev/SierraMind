<?php
/**
 * @package MailTemplateResource
* @author Mohamed <dev@peeap.com>
 * @contributor Sabbi <[dev@peeap.com]>
 * @contributor  Mamun <[dev@peeap.com]>
 * @created 20-05-2024
 * @modified 04-10-2024
 */
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MailTemplateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request = [])
    {
        return [
            'id' => $this->id,
            'name' => $this->slug,
            'subject' => $this->subject,
            'status' => $this->status,
            'created_at' => $this->format_created_at,
        ];
    }
}
