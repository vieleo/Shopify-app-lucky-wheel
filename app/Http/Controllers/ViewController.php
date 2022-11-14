<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lucky;
use App\Models\Color;
use App\Models\Content;
use App\Models\Setting;
use App\Models\Trigger;


class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        $this->middleware('verify.shopify');


    }
    public function index(){
        $shop = Auth::user();
        $shop_modun = $shop->name;
        $themes = $shop->api()->rest('GET', '/admin/themes.json');
        $activeThemeId = "";
        foreach($themes['body']->container['themes'] as $theme){
            if($theme['role'] == "main") $activeThemeId = $theme['id'] ;
        }
        $wheel = Lucky::where('shop_modun', '=', $shop_modun)->first(['configall','id']);
        // $color = Color::where('shop_modun', '=', $shop_modun)->first();
        // $content = Content::where('shop_modun', '=', $shop_modun)->first();
        // $trigger = Trigger::where('shop_modun', '=', $shop_modun)->first();
        // $setting = Setting::where('shop_modun', '=', $shop_modun)->first();


        if(empty($wheel)){
            $wheel = '';

        }else {
            $lucky_edit = $wheel->configall;
            $wheelconfig = "";
            $wheelconfig .= "<script class=\"json-config-lucky\" type=\"application/json\" id=\"magepow_config_wheel_laravel_app\">{";
            $wheelconfig .= '"configall": '.$lucky_edit;
            $wheelconfig .= "}</script>";
        return view('view',['wheel' => $wheel,  'shop_modun' => ['shop_name' => $shop_modun]]);

    }
}
}
