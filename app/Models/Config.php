<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;
    protected $fillable = [
        'triggerType',
        'title_simple',
        'colorText',
        'colorBackground',
        'triggerPosition',
        'showPlayGameTrigger',
        'name',
        'image',
        'desktopfirst',
        'desktopsecond',
        'mobilefirst',
        'mobilesecond',
        'button_name',
        'content_name',
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
    ];
}
