<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsAppAutomation extends Model
{
    //
   
    protected $fillable = [
        'keyword',
        'business_name',
        'phone_number',
    ];
}
