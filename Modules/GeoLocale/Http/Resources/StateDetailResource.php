<?php
/**
 * @package StateDetailResource
* @author peeap <pay.peeap@gmail.com>
 * @contributor Mohame<[pay.peeap@gmail.com]>
 * @created 05-09-2024
 */


namespace Modules\GeoLocale\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StateDetailResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            "country_id" => $this->country_id,
            "country_code" => $this->country->code,
            "iso2" => $this->code,
        ];
    }
}
