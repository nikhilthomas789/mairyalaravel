<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{	
	 protected $fillable = ['aname', 'acontact', 'aemail', 'adob', 'marital_status', 'drivers_licence_type', 'drivers_licence_no', 'acity', 'cpostcode', 'famount', 'cashdeposit', 'tradeinvalue', 'preferredterm', 'vehicledescription'];


     protected $table = 'finance';
}
