<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'keyword',
        'business_name',
        'url',
        'phone_number',
        'address',
        'category',
        'ratings',
        'reviews',
        'page_number',
        'google_map_link',
        'google_email_1',
        'google_email_2',
        'google_email_3',
        'google_email_4',
        'google_email_5',
        'google_email_6',
        'google_email_7',
        'captcha_free_email_1',
        'captcha_free_email_2',
        'captcha_free_email_3',
        'facebook_link',
        'instagram_link',
        'twitter_link',
        'youtube_link',
        'linkedin_link',
        'contact_us_page',

    ];
}
