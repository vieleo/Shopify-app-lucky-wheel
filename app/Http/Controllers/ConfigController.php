<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;
use Illuminate\Support\Facades\Auth;



class ConfigController extends Controller
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
        $config = Config::where('shop_modun', '=', $shop_modun)->first(['configall','id']);
        // $color = Color::where('shop_modun', '=', $shop_modun)->first();
        // $content = Content::where('shop_modun', '=', $shop_modun)->first();
        // $trigger = Trigger::where('shop_modun', '=', $shop_modun)->first();
        // $setting = Setting::where('shop_modun', '=', $shop_modun)->first();


        if(empty($config)){
            $config = '';

        }else {
            $lucky_edit = $config->configall;
            $wheelconfig = "";
            $wheelconfig .= "<script class=\"json-config-lucky\" type=\"application/json\" id=\"magepow_config_wheel_laravel_app\">{";
            $wheelconfig .= '"configall": '.$lucky_edit;
            $wheelconfig .= "}</script>";

            // $wheel = json_decode($wheel);

        // $lucky_wheel_js = file_get_contents(base_path('public/js/hc-canvas-luckwheel.js'), true);
        // $array_js = array('asset' => array('key' => 'assets/hc-canvas-luckwheel.js', 'value' => $lucky_wheel_js));
        // $shop->api()->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', $array_js);

        // $lucky_wheel_css = file_get_contents(base_path('public/css/hc-canvas-luckwheel.css'), true);
        // $array_js = array('asset' => array('key' => 'assets/hc-canvas-luckwheel.css', 'value' => $lucky_wheel_css));
        // $shop->api()->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', $array_js);

        // $lucky_main_css = file_get_contents(base_path('public/css/main.css'), true);
        // $array_js = array('asset' => array('key' => 'assets/main.css', 'value' => $lucky_main_css));
        // $shop->api()->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', $array_js);

        // $lucky_wheel_typo_css = file_get_contents(base_path('public/css/typo/typo.css'), true);
        // $array_js = array('asset' => array('key' => 'assets/typo.css', 'value' => $lucky_wheel_typo_css));
        // $shop->api()->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', $array_js);

        // $lucky_wheel = file_get_contents(base_path('public/js/lucky-wheel-config.liquid'), true);
        // $array = array('asset' => array('key' => 'snippets/lucky-wheel-config.liquid', 'value' => $wheelconfig.$lucky_wheel));
        // $shop->api()->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', $array);

        // $lucky_wheel = json_decode($lucky_edit);
        // foreach($lucky_wheel as $wheell){
        //     $image = file_get_contents(public_path('tmp/uploads/'.$wheell->image), true);
        //     // $image_str = str_replace("tmp/uploads/","","$wheell->image");
        //     // $themeId = str_replace('</tmp/uploads/>', $lucky.'</tmp/uploads/>', $wheell->image);
        //     $imageArray = array('asset' => array('key' => 'assets/'.$wheell->image, 'attachment' =>  base64_encode($image)));
        //     $shop->api()->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', $imageArray);
        // }

        // $image = file_get_contents(public_path('tmp/uploads/miss.png'), true);
        // $imageArray = array('asset' => array('key' => 'assets/miss.png', 'attachment' =>  base64_encode($image)));
        // $shop->api()->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', $imageArray);

        // $lucky_liquid = file_get_contents(base_path('public/js/lucky.liquid'), true);
        // $array = array('asset' => array('key' => 'snippets/lucky.liquid', 'value' => $lucky_liquid));
        // $shop->api()->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', $array);

        //     }

        // $theme_array = $shop->api()->rest('GET', '/admin/themes/'.$activeThemeId.'/assets.json', array('asset'=>array('key'=>'layout/theme.liquid')));
        // $themeId = "";
        // foreach($theme_array['body']['container'] as $theme){
        //     $themeId = $theme['value'];
        // }
        // $lucky = "{% include 'lucky-wheel-config' %}";
        // if(!empty($themeId)) {
        //     if(!strstr($themeId,$lucky)) {

        //         $themeId = str_replace('</main>', $lucky.'</main>', $themeId);
        //         $shop->api()->rest('PUT', '/admin/themes/'.$activeThemeId.'/assets.json', array('asset'=>array('key'=>'layout/theme.liquid','value'=> $themeId)));
        //     }
        }
          // $wheel = Lucky::pluck('configall')->first();
           return view('admin',['config' => $config,'shop_modun' => ['shop_name' => $shop_modun]]);
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

            $config = new Config;
            $config->shop_modun = $request->shop_modun;
            $check = [];
            foreach($request->name as $key => $value){
                    $check[] =  array(
                        'name' => $value,
                        'image' => $image[$key],
                        'chance' => $request->chance[$key],
                        // 'triggerType'=>$request->triggerType[$key],
                        // 'title_simple'=>$request->title_simple[$key],
                        // 'title_sub'=>$request->title_sub[$key],
                        // 'active_within'=>$request->active_within[$key],
                        // 'counterTimer'=>$request->counterTimer[$key],
                        // 'colorText'=>$request->colorText[$key],
                        // 'colorBackground'=>$request->colorBackground[$key],
                        // 'triggerPosition'=>$request->triggerPosition[$key],
                        // 'showPlayGameTrigger'=>$request->showPlayGameTrigger[$key]

                        );
            }



            $config->configall = json_encode($check);
            $config->save();

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
        $luckyWheel =  Config::where('id', '=', $id)->first();

        return view('edit', ['luckyWheel' => $luckyWheel]);
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
        $luckyWheel =  Config::where('id', '=', $request->config_id);

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
                $checkData[] =  array('name' => $item, 'image' => $image[$key], 'chance' => $request->chance[$key]);

            }else{
                $checkData[] =  array('name' => $item, 'image' => $request->img_hide[$key], 'chance' => $request->chance[$key]);
            }
        }


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
        //
    }
}
