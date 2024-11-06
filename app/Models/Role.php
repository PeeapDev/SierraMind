<?php
/**
 * @package Role
* @author Mohamed <dev@peeap.com>
 * @contributor Sabbi <[dev@peeap.com]>
 * @contributor  Mamun <[dev@peeap.com]>
 * @created 20-05-2024
 * @modified 04-10-2024
 */

namespace App\Models;

use App\Models\Model;

class Role extends Model
{
    /**
     * timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'type',
        'description'
    ];

     /**
     * Relation with RoleUser model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roleUser()
    {
        return $this->hasMany('App\Models\RoleUser', 'role_id');
    }

    /**
     * Relation with User model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user()
    {
        return $this->belongsToMany(User::class)->using(RoleUser::class);
    }
}
