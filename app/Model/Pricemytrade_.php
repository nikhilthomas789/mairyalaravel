<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pricemytrade extends Model
{	
	 protected $fillable = ['name','contact','email','profession','city','postcode'];


     protected $table = 'pricemytrade';
}
