<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function dealer(){
        return $this->belongsTo('App\Models\Dealer');
    }

    public function bank(){
        return $this->hasMany('App\Models\Bank');
    }
}
