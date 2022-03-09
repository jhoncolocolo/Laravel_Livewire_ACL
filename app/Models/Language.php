<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model; 
 
 


class Language extends Model
{ 
 
	protected $table = 'languages';
 
	protected $primaryKey = 'id';
 
	protected $fillable = ["name_en","name_es","meaning_name_en","meaning_name_es"];
 
	protected $hidden = ['created_at','updated_at'];

	
 
}