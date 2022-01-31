<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOrder extends Model
{
    use HasFactory;
    Protected $guarded = [''];

    public function company(){
        return $this->belongsTo('App\Models\Company');
    }

    public function dealer(){
        return $this->belongsTo('App\Models\Dealer');
    }

    
}
