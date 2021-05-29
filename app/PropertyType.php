<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PropertyCategory;

class PropertyType extends Model
{
    protected $fillable =['property_name','description','status'];
    public function PropertyCategory()
    {
        return $this->hasMany('App\PropertyCategory');
    }
}
