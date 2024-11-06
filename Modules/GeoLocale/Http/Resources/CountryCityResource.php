<?php
/**
 * @package CountryCityResource
* @author peeap <pay.peeap@gmail.com>
 * @contributor Mohamed <[pay.peeap@gmail.com]>
 * @created 05-09-2024
 */


namespace Modules\GeoLocale\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryCityResource extends JsonResource
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
            'name' => $this->name
        ];
    }
}
