<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $fillable=['user','username','email','password','	facebookId','mobile','file',
    'firstname','lastname','language','country_id','state_id','city_id','facebook','Instagram',
    'description','is_verify','is_forgot_password','rand_id','status'];
}
