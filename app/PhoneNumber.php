<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    //
    protected $fillable=['name','phone','office_id'];

    public function Office(){
        return $this->belongsTo(Office::class);
    }
}
