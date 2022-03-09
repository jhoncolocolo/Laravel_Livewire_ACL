<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model; 
 
use Illuminate\Database\Eloquent\Relations\BelongsTo; 


class AutoDataStep extends Model
{ 
 
	protected $table = 'auto_data_steps';
 
	protected $primaryKey = 'id';
 
	protected $fillable = ["user_id","auto_programming_language_id","name","description"];
 
	protected $hidden = ['created_at','updated_at'];

	
  /**
   * @return  mixed
  */
  public function user(): BelongsTo
  {
      return $this->belongsTo(User::class);
  }

  /**
   * @return  mixed
  */
  public function auto_programming_language(): BelongsTo
  {
      return $this->belongsTo(AutoProgrammingLanguage::class);
  }

 
}