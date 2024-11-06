<?php
/**
 * @package Permission
* @author Mohamed <dev@peeap.com>
 * @contributor Sabbi <[dev@peeap.com]>
 * @contributor  Mamun <[dev@peeap.com]>
 * @created 20-05-2024
 * @modified 04-10-2024
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Model;
use App\Models\RoleUser;

class Permission extends Model
{
    use HasFactory;

    /**
     * insert permission
     * @return boolean
     */
    public static function insertPermission(array $permissions)
    {
        if (self::insert($permissions)) {
            self::forgetCache();
            return true;
        }
        return false;
    }

    /**
     * auth user permissions name
     * @param  int $userId
     * @return array
     */
    public static function getAuthUserPermission($userId)
    {
        return PermissionRole::permissionNamesByRoleID(RoleUser::getRoleIDByUser($userId));
    }
}
