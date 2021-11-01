<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Creditors extends Model
{

		 protected $fillable = ['link', 'domain', 'da', 'cat_id', 'message'];

     protected $table = 'creditors';
}
