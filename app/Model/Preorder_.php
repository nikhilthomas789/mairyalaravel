<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Preorder extends Model
{	
	 protected $fillable = ['make', 'model', 'color','yearfrom', 'yearto', 'odometerfrom', 'odometerto', 'name', 'contact', 'email', 'comment'];


     protected $table = 'preorder';
}
