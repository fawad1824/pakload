<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoadingRatting extends Model
{
    protected $table = 'loading_rattings';
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
