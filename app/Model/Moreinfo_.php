<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Moreinfo extends Model
{	
	 protected $fillable = [  'v_id', 'manufacturers', 'models', 'bodystyle', 'name', 'prefered_way', 'email', 'phone', 'message'];
     protected $table = 'vehicle_more_info';
}
