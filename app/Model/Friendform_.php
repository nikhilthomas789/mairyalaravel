<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Friendform extends Model
{	
	 protected $fillable = ['v_id', 'manufacturers', 'models', 'bodystyle', 'name', 'email', 'friend_email', 'message'];


     protected $table = 'vehicle_emailfriend';
}
