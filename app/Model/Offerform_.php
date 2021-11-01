<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Offerform extends Model
{	
	 protected $fillable = ['v_id', 'manufacturers', 'models', 'bodystyle', 'name', 'prefered_way', 'email', 'phone', 'price', 'finance', 'message'];


     protected $table = 'vehicle_offer';
}
