<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $fillable = [
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
