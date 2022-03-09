<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\Relations\HasMany; 
 


class AutoProgrammingLanguage extends Model
{ 
 
	protected $table = 'auto_programming_languages';
 
	protected $primaryKey = 'id';
 
	protected $fillable = ["name","description"];
 
	protected $hidden = ['created_at','updated_at'];

  /**
   * @return  mixed
  */
  public function auto_data_step(): HasMany
  {
      return $this->hasMany(AutoDataStep::class);
  }

	
 
}