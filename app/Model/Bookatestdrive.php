<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bookatestdrive extends Model
{	
	 protected $fillable = ['v_id','afmmanufacturer', 'afmmodel', 'afmname', 'afmcontact', 'afmemail', 'afmdate', 'afmtime', 'afmmessage'];


     protected $table = 'book_a_test_drive';
}
