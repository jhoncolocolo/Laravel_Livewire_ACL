<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\Relations\HasMany; 
 


class Permission extends Model
{ 
 
	protected $table = 'permissions';
 
	protected $primaryKey = 'id';
 
	protected $fillable = ["name","route","description"];
 
	protected $hidden = ['created_at','updated_at'];

  /**
   * @return  mixed
  */
  public function permission_role(): HasMany
  {
      return $this->hasMany(PermissionRole::class);
  }

  /**
   * @return  mixed
  */
  public function permission_user(): HasMany
  {
      return $this->hasMany(PermissionUser::class);
  }

	
 
}