<?php 

namespace App\Permissions;

use App\Models\Role;
use App\Models\Permission;

trait HasPermissionTrait
{
	/* hasPermissionTo */
	public function hasPermissionTo($permission)
	{
		// Permission Berdasarkan Role
		return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);	
	}

	/* hasPermissionThroughRole */
	protected function hasPermissionThroughRole($permission)
	{
		foreach ($permission->roles as $role) {
			if ($this->roles->contains($role)) {
				return true;
			}
		}
		return false;
	}
 
	/* hasPermission */
	protected function hasPermission($permission)
	{
		return (bool) $this->permissions->where('name', $permission->name)->count();
	}

	/* hasRole */
	public function hasRole( ... $roles )
	{
		foreach ($roles as $role) {
			// cek di table roles, apakah contains (mengandung/ ada) name->$role(yang di oper dari hasil auth nya)
			if ($this->roles->contains('name', $role)) {
				return true;
			}
		}
		return false;
	}

	public function roles()
	{
		return $this->belongsToMany(Role::class, 'users_roles');
	}

	public function permissions()
	{
		return $this->belongsToMany(Permission::class, 'users_permissions');
	}
}