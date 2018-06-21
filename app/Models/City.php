<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;
//use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
   // use SoftDeletes;
  
    //use Translatable;

    public $translatedAttributes = ['name'];

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
   // protected $dates = ['deleted_at'];

    

    public function districts()
    {
        return $this->hasMany(District::class , 'area_id');
    }

    // public function languages()
    // {
    //     return $this->hasMany(CityTranslation::class ,'city_id');
    // }

}
