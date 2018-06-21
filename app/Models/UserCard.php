<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class UserCard extends Model
{
    protected $table = 'user_cards';
    
    public function user()
    {
        return $this->belongsTo(User::class ,'user_id');
    }

    public function card()
    {
        return $this->belongsTo(Card::class ,'card_id');
    }

}
