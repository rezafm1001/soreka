<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Office extends Model
{
    //
    use SoftDeletes;
    protected $fillable=[
        'office_name',
        'city_name',
        'activity',
        'expert_name',
        'manager_name',
        'sell_model',
        'description',
        'brand',
        'address',
        'user_id',
    ];

    public function PhoneNumbers(){
        return $this->hasMany(PhoneNumber::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
