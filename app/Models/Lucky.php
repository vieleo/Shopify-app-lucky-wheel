<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lucky extends Model
{
    use HasFactory;
    protected $fillable = [
        'configall',
        // coupons
        'name',
        'image',
        'chance',
        // content
        'desktopfirst',
        'desktopsecond',
        'mobilefirst',
        'mobilesecond',
        'button_name',
        'content_name',
        // design
        'background',
        'converText',
        'converTextMobile',
        'cupponText',
        'buttonColor',
        'buttonText',
        'buttonShadow',
        'cupponCodeText',
        'disclaimerText',
        'popupBackground',
        // trigger
        'triggerType',
        'title_simple',
        'colorText',
        'colorBackground',
        'triggerPosition',
        'showPlayGameTrigger',
        // setting
        'start_time',
        'end_time',
        'day_hide',

    ];

}
