<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MailTemplate extends Model
{
    protected $fillable = [
        'category',
        'subject',
        'message',
        'formAddress',
        'smtp'
        
        
    ];
    
}
