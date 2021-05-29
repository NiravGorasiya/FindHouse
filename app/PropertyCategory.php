<?php

namespace App;
use App\PropertyType;
use Illuminate\Database\Eloquent\Model;


class PropertyCategory extends Model
{
    protected $fillable =['propertytype_id','property_category','status'];

    public function PropertyType()
    {
        return $this->belongsTo('App\PropertyType');
    }
}
