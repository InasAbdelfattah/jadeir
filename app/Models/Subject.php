<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Subject extends Model
{
    /**
     * @var array
     * @ $fillable array of available varible to display.
     */
 
    
    public function stage()
    {
        return $this->belongsTo(Stage::class ,'stage_id');
    }

    public function scopeById($query, $id)
    {
        if ($id != '') {
            $query->where('id', $id);
        }
        return $query->first();
    }

}
