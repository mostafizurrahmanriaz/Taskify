<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function services(){
        return $this->hasMany(Service::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    
}
