<?php

/**
 * @package RoleService
* @author Mohamed <dev@peeap.com>
 * @contributor Sabbi <[dev@peeap.com]>
 * @contributor  Mamun <[dev@peeap.com]>
 * @created 20-05-2024
 * @modified 04-10-2024
 */

namespace App\Services;

use App\Models\PermissionRole;
use App\Models\Role;
use App\Models\RoleUser;
use App\Traits\MessageResponseTrait;
use Exception;
use Illuminate\Support\Facades\DB;

class RoleService
{
    use MessageResponseTrait;

    /**
     * Service
     */
    public string|null $service;

    /**
     * Initialize
     *
     * @param string $service
     * @return void
     */
    public function __construct($service = null)
    {
        $this->service = $service;

        if (is_null($service)) {
            $this->service = __('Role');
        }
    }

    /**
     * Store Role
     *
     * @param array $data
     * @return array
     */
    public function store(array $data): array
    {
        if (Role::create($data)) {
            Role::forgetCache();

            return $this->saveSuccessResponse();
        }

        return $this->saveFailResponse();
    }

    /**
     * Update Role
     *
     * @param int $id
     * @param array $data
     * @return array
     */
    public function update(array $data, int $id): array
    {
        $role = Role::find($id);

        if (!$role) {
            $this->notFoundResponse();
        }

        if (in_array($data['slug'], defaultRoles())) {
            $remove = ['type', 'slug'];

            $data = array_diff_key($data, array_flip($remove));
        }

        if ($role->update($data)) {
            Role::forgetCache();

            return $this->saveSuccessResponse();
        }

        return $this->saveFailResponse();
    }

    /**
     * Delete Role
     *
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        $role = Role::find($id);

        if (!$role) {
            return $this->notFoundResponse();
        }

        if (in_array($role->slug, defaultRoles())) {
            return ['status' => 'fail', 'message' => __('You can not delete this role')];
        }

        try {
            DB::beginTransaction();

            RoleUser::where('role_id', $role->id)->delete();
            PermissionRole::where('role_id', $role->id)->delete();
            $role->delete();

            Role::forgetCache(['roles', 'role_users', 'permission_roles']);
            DB::commit();

            return $this->deleteSuccessResponse();
        } catch (Exception $e) {
            DB::rollBack();

            return ['status' => 'fail', 'message' => $e->getMessage()];
        }
    }
}
