<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhoneNumber extends Model
{
    //
    use SoftDeletes;

    protected $fillable=['name','phone','office_id'];

    public function Office(){
        return $this->belongsTo(Office::class);
    }
}
