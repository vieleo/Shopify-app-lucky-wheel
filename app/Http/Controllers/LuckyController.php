<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lucky;
use App\Models\Color;
use App\Models\Content;
use App\Models\Setting;
use App\Models\Trigger;


class LuckyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop = Auth::user();
        $shop_modun = $shop->name;
        $themes = $shop->api()->rest('GET', '/admin/themes.json');
        $activeThemeId = "";
        foreach($themes['body']->container['themes'] as $theme){
            if($theme['role'] == "main") $activeThemeId = $theme['id'] ;
        }
        $wheel = Lucky::where('shop_modun', '=', $shop_modun)->first(['configall', 'id']);
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

            $wheel = json_decode($wheel);

        $lucky_wheel_js = file_get_contents(base_path('public/js/hc-canvas-luckwheel.js'), true);
        $array_js = array('asset' => array('key' => 'assets/hc-canvas-luckwheel.js', 'value' => $lucky_wheel_js));
        $shop->api()->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', $array_js);

        $lucky_wheel_js = file_get_contents(base_path('public/js/main.js'), true);
        $array_js = array('asset' => array('key' => 'assets/main.js', 'value' => $lucky_wheel_js));
        $shop->api()->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', $array_js);

        $lucky_wheel_css = file_get_contents(base_path('public/css/hc-canvas-luckwheel.css'), true);
        $array_js = array('asset' => array('key' => 'assets/hc-canvas-luckwheel.css', 'value' => $lucky_wheel_css));
        $shop->api()->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', $array_js);

        $lucky_main_css = file_get_contents(base_path('public/css/main.css'), true);
        $array_js = array('asset' => array('key' => 'assets/main.css', 'value' => $lucky_main_css));
        $shop->api()->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', $array_js);

        $lucky_wheel_typo_css = file_get_contents(base_path('public/css/typo/typo.css'), true);
        $array_js = array('asset' => array('key' => 'assets/typo.css', 'value' => $lucky_wheel_typo_css));
        $shop->api()->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', $array_js);

        $image = file_get_contents(public_path('images/bg_lk.png'), true);
        $imageArray = array('asset' => array('key' => 'assets/bg_lk.png', 'attachment' =>  base64_encode($image)));
        $shop->api()->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', $imageArray);

        $lucky_wheel = file_get_contents(base_path('public/js/lucky-wheel-config.liquid'), true);
        $array = array('asset' => array('key' => 'snippets/lucky-wheel-config.liquid', 'value' => $wheelconfig.$lucky_wheel));
        $shop->api()->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', $array);

        $lucky_wheel = (array) json_decode($lucky_edit);
        foreach($lucky_wheel['coupons'] as $coupons){
            foreach($coupons as $key => $value){
                if($key == 'image'){
                    $image = file_get_contents(public_path('tmp/uploads/'.$value), true);

                    $imageArray = array('asset' => array('key' => 'assets/'.$value, 'attachment' =>  base64_encode($image)));
                    $shop->api()->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', $imageArray);
                }
            }

        }

        $lucky_liquid = file_get_contents(base_path('public/js/lucky.liquid'), true);
        $array = array('asset' => array('key' => 'snippets/lucky.liquid', 'value' => $lucky_liquid));
        $shop->api()->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', $array);

            }

        $theme_array = $shop->api()->rest('GET', '/admin/themes/'.$activeThemeId.'/assets.json', array('asset'=>array('key'=>'layout/theme.liquid')));
        $themeId = "";
        foreach($theme_array['body']['container'] as $theme){
            $themeId = $theme['value'];
        }
        $lucky = "{% include 'lucky-wheel-config' %}";
        if(!empty($themeId)) {
            if(!strstr($themeId,$lucky)) {

                $themeId = str_replace('</main>', $lucky.'</main>', $themeId);
                $shop->api()->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', array('asset'=>array('key'=>'layout/theme.liquid','value'=> $themeId)));
            }
        }

           return view('admin',['wheel' => $wheel, 'shop_modun' => ['shop_name' => $shop_modun]]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(is_null($request->config_id)){
        $this->image = '';
            if($request->file('image')){
                $path = public_path('tmp/uploads');
                if ( ! file_exists($path) ) {
                    mkdir($path, 0777, true);
                }
                $image = [];
                if ($request->hasfile('image')) {
                    foreach ($request->file('image') as $file) {
                        $name = $file->getClientOriginalName();
                        $file->move($path, $name);
                        $image[] = $name;
                    }
                }
            }

        $lucky = new Lucky;
        $lucky->shop_modun = $request->shop_modun;
        $check = [];

        foreach($request->name as $key => $value){
                $check['coupons'][] =  array(
                    'name' => $value,
                    'image' => $image[$key],
                    'chance' => $request->chance[$key]

                    );

        }
        $check['text'] =   [
            'desktopfirst'=> [
                'text'     => $request->desktopfirst,
                'font' => $request->font_desktopfirst,
                'size' => $request->size_desktopfirst,
            ],
            'desktopsecond'=> [
                'text'     => $request->desktopsecond,
                'font'     => $request->font_desktopsecond,
                'size'     => $request->size_desktopsecond,
            ],
            'button_name'=> [
                'text'     => $request->button_name,
                'font'     => $request->font_button_name,
                'size'     => $request->size_button_name,
            ],
            'content_name'=> [
                'text'     => $request->content_name,
                'font'     => $request->font_content_name,
                'size'     => $request->size_content_name,
            ],
        ];


        $check['color'] = [
            'background'=> $request->background,
            'converText'=> $request->converText,
            'cupponText'=> $request->cupponText,
            'buttonColor'=> $request->buttonColor,
            'buttonText'=> $request->buttonText,
            'buttonShadow'=> $request->buttonShadow,
            'contentshadow'=> $request->contentshadow,
            'contentBgr'=> $request->contentBgr,
            'disclaimerText'=> $request->disclaimerText,

        ];

        $check['trigger'] = [
            'title_simple'=> $request->title_simple,
            'title_sub'=> $request->title_sub,
            'active_within'=> $request->active_within,
            'birthdaytime'=> $request->birthdaytime,
            'colorText'=> $request->colorText,
            'colorBackground'=> $request->colorBackground,
            'triggerPosition'=> $request->triggerPosition,
            'showPlayGameTrigger'=> $request->showPlayGameTrigger
        ];

        $check['setting'] = [
            'frequency' => $request->frequency,
            'start_time'=> $request->start_time,
            'end_time'=> $request->end_time,
            'day_hide'=> $request->day_hide

        ];


        $lucky->configall = json_encode($check);
        $lucky->save();
        }else{
            $this->update($request);

        }

        return redirect('/')->with('status', 'Blog Post Form Data Has Been inserted');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $luckyWheel =  Lucky::where('id', '=', $id)->first();

        return view('admin', ['luckyWheel' => $luckyWheel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $luckyWheel =  Lucky::where('id', '=', $request->config_id);

        if($request->file('image')){
            $path = public_path('tmp/uploads');
            if ( ! file_exists($path) ) {
                mkdir($path, 0777, true);
            }
            $image = [];
            if ($request->hasfile('image')) {
                foreach ($request->file('image') as $key => $file) {
                    $name = $file->getClientOriginalName();
                    $file->move($path, $name);
                    $image[$key] = $name;
                }
            }

        }else{
            $image = '';
        }

        $checkData = [];
        foreach($request->name as $key => $item){
            if(gettype($image) == 'array' && array_key_exists($key, $image)){
                $checkData['coupons'][] =  array(
                    'name' => $item,
                    'image' => $image[$key],
                    'chance' => $request->chance[$key],
                    );

            }else{
                $checkData['coupons'][] =  array(
                    'name' => $item,
                    'image' => $request->img_hide[$key],
                    'chance' => $request->chance[$key],

                );
            }
        }
        $checkData['text'] = [
            'desktopfirst'=> [
                'text'     => $request->desktopfirst,
                'font' => $request->font_desktopfirst,
                'size' => $request->size_desktopfirst,
            ],
            'desktopsecond'=> [
                'text'     => $request->desktopsecond,
                'font'     => $request->font_desktopsecond,
                'size'     => $request->size_desktopsecond,
            ],
            'button_name'=> [
                'text'     => $request->button_name,
                'font'     => $request->font_button_name,
                'size'     => $request->size_button_name,
            ],
            'content_name'=> [
                'text'     => $request->content_name,
                'font'     => $request->font_content_name,
                'size'     => $request->size_content_name,
            ],
        ];

        $checkData['color'] = [
            'background'=> $request->background,
            'converText'=> $request->converText,
            'cupponText'=> $request->cupponText,
            'buttonColor'=> $request->buttonColor,
            'buttonText'=> $request->buttonText,
            'buttonShadow'=> $request->buttonShadow,
            'contentshadow'=> $request->contentshadow,
            'contentBgr'=> $request->contentBgr,
            'disclaimerText'=> $request->disclaimerText,


        ];

        $checkData['trigger'] = [
            'title_simple'=> $request->title_simple,
            'title_sub'=> $request->title_sub,
            'active_within'=> $request->active_within,
            'birthdaytime'=> $request->birthdaytime,
            'colorText'=> $request->colorText,
            'colorBackground'=> $request->colorBackground,
            'triggerPosition'=> $request->triggerPosition,
            'showPlayGameTrigger'=> $request->showPlayGameTrigger
        ];

        $checkData['setting'] = [
            'frequency' => $request->frequency,
            'start_time'=> $request->start_time,
            'end_time'=> $request->end_time,
            'day_hide'=> $request->day_hide

        ];


        $luckyWheel->configall = json_encode($checkData);
        $luckyWheel->update([
            'configall' => $luckyWheel->configall,
        ]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lucky= Lucky::findOrFail($id);
        $lucky->delete();
        return view('edit');
    }
}
