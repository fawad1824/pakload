<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loading extends Model
{
    //
    protected $table = 'loadings';
    protected $guarded = [];

    public function users(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function bidding(){
        return $this->hasMany(BiddingLoad::class, 'load_id', 'id');
    }
}
