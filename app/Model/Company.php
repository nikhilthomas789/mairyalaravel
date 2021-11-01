<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
     protected $table = 'company';
     protected $fillable = ['company_name' ,'company_email', 'company_phone','company_logo','company_address', 'created_at', 'updated_at'];

}
