<?php
/**
 * @package UserResource
* @author Mohamed <dev@peeap.com>
 * @contributor Sabbi <[dev@peeap.com]>
 * @contributor  Mamun <[dev@peeap.com]>
 * @created 20-05-2024
 * @modified 04-10-2024
 */
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $pictureURL  = url("public/dist/img/avatar.jpg");
        $pictureName = "avatar.jpg";
        if (isset($this->avatarFile->file_name) && !empty($this->avatarFile->file_name) && isExistFile('public/uploads/user/thumbnail/' . $this->avatarFile->file_name)) {
            $pictureURL  = objectStorage()->url("public/uploads/user/thumbnail/" . $this->avatarFile->file_name);
            $pictureName = $this->avatarFile->file_name;
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'eamil' => $this->email,
            'status' => $this->status,
            'created_at' => $this->format_created_at,
            'picture_name' => $pictureName,
            'picture_url' => $pictureURL,
        ];
    }
}
