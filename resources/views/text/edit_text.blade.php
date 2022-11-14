<?php
   if($wheel && $wheel->configall != null  ){
    $config = json_decode($wheel->configall);
 }else{
  $config = [
    "color" => [
      "background"	  =>	"#ff0000",
      "converText"  	=>	"#d90d0d",
      "cupponText"	  =>	"#25aed0",
      "buttonColor"	  =>	"#ffffff",
      "buttonText"  	=>	"#ff0000",
      "buttonShadow"	=>	"#ff142c",
      "contentshadow"	=>  "#c41c76",
      "contentBgr"	  =>	"#319682",
      "disclaimerText"=>  "#ff0000"
    ],
    "text" => [
        "desktopfirst"	=> [
          "text" => "TO UNLOCK TODAY EXCLUSIVE DISCOUNT?",
          "font" => "courier",
          "size" => "25"
        ]	,
        "desktopsecond"	=> [
          "text" => "ENTER YOUR EMAIL TO REVEAL YOUR SPECIAL OFFER!",
          "font" => "courier",
          "size" => "25"
        ]	,
        "button_name"	=> [
          "text" => "SPIN THE WHEEL!",
          "font" => "courier",
          "size" => "25"
        ]	,
        "content_name"	=> [
          "text" => "* You can spin the wheel only once.",
          "font" => "courier",
          "size" => "25"
        ]
    ],
    "trigger" => [
      "title_simple"	=>	"SPIN THE WHEEL!",
      "title_sub"	    =>	"Not Redeemed",
      "active_within"	=>	"Activate within",
      "birthdaytime"	=>	"2022-10-27T01:22",
      "colorText"   	=>		"#ffffff",
      "colorBackground"	=>		"#eb0000",
      "triggerPosition"	=>	"right",
      "showPlayGameTrigger"	=>	"show"
    ],
    "setting"	=> [
      "start_time"	=>	"1",
      "end_time"	=>	"24",
      "day_hide"	=>	"1"
    ],
    "coupons" => [
    [
        "name"	=>	"Việt",
        "image"	=>	"j2_logo.png",
        "chance"	=>	"40"
    ],

    [
        "name"	=>	"Nguyễn",
        "image"	=>	"miss.png",
        "chance"	=>	"60"
    ],
    [
        "name"	=>	"Việt",
        "image"	=>	"Ao.png",
        "chance"	=>	"90"
    ]
    ],
    ];
    $config = json_decode(json_encode($config));
 }
?>
<div class="row-content" style="background: white;">
@foreach ($config as $key => $configText)
        @if($key == 'text')
        {{-- TITLE DESKTOP FIRST --}}
            <div class="form-group">
                <div class="form-group">
                    <div>
                        <p class="input-label" style="margin-top: 10px;">
                            <div class="checkbox without-checkbox">
                                <p>
                                    <div style="font-weight: 800;">TITLE DESKTOP FIRST</div>
                                </p>
                            </div>
                        </p>
                        <input type="text" style="width: 50%;" name="desktopfirst" id="desktopfirst" value="{{ $configText->desktopfirst->text }}" class="form-control" onkeyup="changeFunction(this, event)">
                    </div>
                </div>
            </div>
                <div class="font" style="float: left" >
                    <div class="lable">
                        <p class="input-label" >Font</p>
                    </div>
                    <div class="form-group" style="width: 80%;">
                        <select class="form-control" name="font_desktopfirst" id="font_desktopfirst">
                                    <!-- ngRepeat: item in list -->
                                    <option  class="list-item ng-scope" value="Brush Script Std" style="font-family:'Brush Script Std';"
                                    {{old('font_desktopfirst',$configText->desktopfirst->font)=="Brush Script Std"? 'selected':''}}>
                                    <span class="ng-binding">Brush Script Std</span>
                                    </option>
                                    <!-- end ngRepeat: item in list -->
                                    <option  class="list-item ng-scope" value="Stencil Std" style="font-family:'Stencil Std';"
                                    {{old('font_desktopfirst',$configText->desktopfirst->font)=="Stencil Std"? 'selected':''}}>
                                    <span class="ng-binding">Stencil Std</span>
                                    </option>
                                    <!-- end ngRepeat: item in list -->
                                    <option  class="list-item ng-scope" value="Comic Sans MS" style="font-family:'Comic Sans MS';"
                                    {{old('font_desktopfirst',$configText->desktopfirst->font)=="Comic Sans MS"? 'selected':''}}>
                                    <span class="ng-binding">Comic Sans MS</span>
                                    </option>
                                    <!-- end ngRepeat: item in list -->
                                    <option  class="list-item ng-scope" value="Lucida Console" style="font-family:'Lucida Console';"
                                    {{old('font_desktopfirst',$configText->desktopfirst->font)=="Lucida Console"? 'selected':''}}>
                                    <span class="ng-binding">Lucida Console</span>
                                    </option>
                                    <!-- end ngRepeat: item in list -->
                                    <option  class="list-item ng-scope" value="Consolas" style="font-family:'Consolas';"
                                    {{old('font_desktopfirst',$configText->desktopfirst->font)=="Consolas"? 'selected':''}}>
                                    <span class="ng-binding">Consolas</span>
                                    </option>
                                    <!-- end ngRepeat: item in list -->
                                    <option  class="list-item ng-scope" value="Times New Roman" style="font-family:'Times New Roman';"
                                    {{old('font_desktopfirst',$configText->desktopfirst->font)=="Times New Roman"? 'selected':''}}>
                                    <span class="ng-binding">Times New Roman</span>
                                    </option>
                                    <!-- end ngRepeat: item in list -->
                                    <option  class="list-item ng-scope" value="Franklin Gothic Medium" style="font-family:'Franklin Gothic Medium';"
                                    {{old('font_desktopfirst',$configText->desktopfirst->font)=="Franklin Gothic Medium"? 'selected':''}}>
                                    <span class="ng-binding">Franklin Gothic Medium</span>
                                    </option>
                                    <!-- end ngRepeat: item in list -->
                                    <option  class="list-item ng-scope" value="Arial" style="font-family:'Arial';"
                                    {{old('font_desktopfirst',$configText->desktopfirst->font)=="Arial"? 'selected':''}}>
                                    <span class="ng-binding">Arial</span>
                                    </option>
                                    <!-- end ngRepeat: item in list -->
                                    <option  class="list-item ng-scope" value="Noto" style="font-family:'Noto';"
                                    {{old('font_desktopfirst',$configText->desktopfirst->font)=="Noto"? 'selected':''}}>
                                    <span class="ng-binding">Noto</span>
                                    </option>
                                    <!-- end ngRepeat: item in list -->
                                    <option  class="list-item ng-scope" value="Arial Black" style="font-family:'Arial Black';"
                                    {{old('font_desktopfirst',$configText->desktopfirst->font)=="Arial Black"? 'selected':''}}>
                                    <span class="ng-binding">Arial Black</span>
                                    </option>
                                    <!-- end ngRepeat: item in list -->
                                    <option  class="list-item ng-scope" value="Arima Madurai" style="font-family:'Arima Madurai';"
                                    {{old('font_desktopfirst',$configText->desktopfirst->font)=="Arima Madurai"? 'selected':''}}>
                                    <span class="ng-binding">Arima Madurai</span>
                                    </option>
                                    <!-- end ngRepeat: item in list -->
                                    <option  class="list-item ng-scope" value="Arvo" style="font-family:'Arvo';"
                                    {{old('font_desktopfirst',$configText->desktopfirst->font)=="Arvo"? 'selected':''}}>
                                    <span class="ng-binding">Arvo</span>
                                    </option>
                                    <!-- end ngRepeat: item in list -->
                                    <option  class="list-item ng-scope" value="Baloo 2" style="font-family:'Baloo 2';"
                                    {{old('font_desktopfirst',$configText->desktopfirst->font)=="Baloo 2"? 'selected':''}}>
                                    <span class="ng-binding">Baloo 2</span>
                                    </option>
                        </select>
                    </div>
                </div>
                <div class="size" style="    margin-left: 25%;">
                    <div class="lable" >
                        <p class="input-label" >Size</p>
                    </div>
                    <div class="form-group" style="width: 10%; height: 43px;">
                        <input class="form-control" type="number" name="size_desktopfirst" value="{{$configText->desktopfirst->size}}">
                    </div>
                </div>
            {{-- end TITLE DESKTOP FIRST --}}
<hr>
            {{-- TITLE DESKTOP SECOND --}}
            <div class="form-group">
                <div class="form-group">
                    <div>
                        <p class="input-label" style="margin-top: 10px;">
                            <div class="checkbox without-checkbox">
                                <p>
                                    <div  style="font-weight: 800;">TITLE DESKTOP SECOND</div>
                                </p>
                            </div>
                        </p>
                        <input type="text" style="width: 50%;" name="desktopsecond" id="desktopsecond" value="{{ $configText->desktopsecond->text }}" class="form-control" onkeyup="changeFunction(this, event)">
                    </div>
                </div>
            </div>
            <div class="font" style="float: left" >
                <div class="lable">
                  <p class="input-label">Font</p>
                  <div class="form-group" style="width: 80%;">
                      <select class="form-control" name="font_desktopsecond" id="font_desktopsecond">
                                <!-- ngRepeat: item in list -->
                                 <option  class="list-item ng-scope" value="Brush Script Std" style="font-family:'Brush Script Std';"
                                {{old('font_desktopsecond',$configText->desktopsecond->font)=="Brush Script Std"? 'selected':''}}>
                                <span class="ng-binding">Brush Script Std</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Stencil Std" style="font-family:'Stencil Std';"
                                {{old('font_desktopsecond',$configText->desktopsecond->font)=="Stencil Std"? 'selected':''}}>
                                <span class="ng-binding">Stencil Std</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Comic Sans MS" style="font-family:'Comic Sans MS';"
                                {{old('font_desktopsecond',$configText->desktopsecond->font)=="Comic Sans MS"? 'selected':''}}>
                                <span class="ng-binding">Comic Sans MS</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Lucida Console" style="font-family:'Lucida Console';"
                                {{old('font_desktopsecond',$configText->desktopsecond->font)=="Lucida Console"? 'selected':''}}>
                                <span class="ng-binding">Lucida Console</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Consolas" style="font-family:'Consolas';"
                                {{old('font_desktopsecond',$configText->desktopsecond->font)=="Consolas"? 'selected':''}}>
                                <span class="ng-binding">Consolas</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Times New Roman" style="font-family:'Times New Roman';"
                                {{old('font_desktopsecond',$configText->desktopsecond->font)=="Times New Roman"? 'selected':''}}>
                                <span class="ng-binding">Times New Roman</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Franklin Gothic Medium" style="font-family:'Franklin Gothic Medium';"
                                {{old('font_desktopsecond',$configText->desktopsecond->font)=="Franklin Gothic Medium"? 'selected':''}}>
                                <span class="ng-binding">Franklin Gothic Medium</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Arial" style="font-family:'Arial';"
                                {{old('font_desktopsecond',$configText->desktopsecond->font)=="Arial"? 'selected':''}}>
                                <span class="ng-binding">Arial</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Noto" style="font-family:'Noto';"
                                {{old('font_desktopsecond',$configText->desktopsecond->font)=="Noto"? 'selected':''}}>
                                <span class="ng-binding">Noto</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Arial Black" style="font-family:'Arial Black';"
                                {{old('font_desktopsecond',$configText->desktopsecond->font)=="Arial Black"? 'selected':''}}>
                                <span class="ng-binding">Arial Black</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Arima Madurai" style="font-family:'Arima Madurai';"
                                {{old('font_desktopsecond',$configText->desktopsecond->font)=="Arima Madurai"? 'selected':''}}>
                                <span class="ng-binding">Arima Madurai</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Arvo" style="font-family:'Arvo';"
                                {{old('font_desktopsecond',$configText->desktopsecond->font)=="Arvo"? 'selected':''}}>
                                <span class="ng-binding">Arvo</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Baloo 2" style="font-family:'Baloo 2';"
                                {{old('font_desktopsecond',$configText->desktopsecond->font)=="Baloo 2"? 'selected':''}}>
                                <span class="ng-binding">Baloo 2</span>
                                </option>
                      </select>
                  </div>
                </div>
            </div>
            <div class="size" style="    margin-left: 25%;">
                  <p class="input-label">Size</p>
                  <div class="form-group" style="width: 10%; height: 43px;">
                      <input class="form-control" type="number" name="size_desktopsecond" value="{{$configText->desktopsecond->size}}">
                  </div>
            </div>
            {{-- end TITLE DESKTOP SECOND --}}
<hr>
            {{-- BUTTON --}}
            <div class="form-group">
                <div class="form-group">
                    <div>
                        <p class="input-label" style="margin-top: 10px;">
                            <div class="checkbox without-checkbox">
                                <p>
                                    <div  style="font-weight: 800;">BUTTON</div>
                                </p>
                            </div>
                        </p>
                        <input type="text" style="width: 50%;" name="button_name" id="button_name" value="{{ $configText->button_name->text }}" class="form-control" onkeyup="changeFunction(this, event)">
                    </div>
                </div>
            </div>
            <div class="font" style="float: left" >
                <div class="lable">
                  <p class="input-label">Font</p>
                  <div class="form-group" style="width: 80%;">
                      <select class="form-control" name="font_button_name" id="font_button_name">
                                <!-- ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Brush Script Std" style="font-family:'Brush Script Std';"
                                {{old('font_button_name',$configText->button_name->font)=="Brush Script Std"? 'selected':''}}>
                                <span class="ng-binding">Brush Script Std</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Stencil Std" style="font-family:'Stencil Std';"
                                {{old('font_button_name',$configText->button_name->font)=="Stencil Std"? 'selected':''}}>
                                <span class="ng-binding">Stencil Std</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Comic Sans MS" style="font-family:'Comic Sans MS';"
                                {{old('font_button_name',$configText->button_name->font)=="Comic Sans MS"? 'selected':''}}>
                                <span class="ng-binding">Comic Sans MS</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Lucida Console" style="font-family:'Lucida Console';"
                                {{old('font_button_name',$configText->button_name->font)=="Lucida Console"? 'selected':''}}>
                                <span class="ng-binding">Lucida Console</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Consolas" style="font-family:'Consolas';"
                                {{old('font_button_name',$configText->button_name->font)=="Consolas"? 'selected':''}}>
                                <span class="ng-binding">Consolas</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Times New Roman" style="font-family:'Times New Roman';"
                                {{old('font_button_name',$configText->button_name->font)=="Times New Roman"? 'selected':''}}>
                                <span class="ng-binding">Times New Roman</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Franklin Gothic Medium" style="font-family:'Franklin Gothic Medium';"
                                {{old('font_button_name',$configText->button_name->font)=="Franklin Gothic Medium"? 'selected':''}}>
                                <span class="ng-binding">Franklin Gothic Medium</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Arial" style="font-family:'Arial';"
                                {{old('font_button_name',$configText->button_name->font)=="Arial"? 'selected':''}}>
                                <span class="ng-binding">Arial</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Noto" style="font-family:'Noto';"
                                {{old('font_button_name',$configText->button_name->font)=="Noto"? 'selected':''}}>
                                <span class="ng-binding">Noto</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Arial Black" style="font-family:'Arial Black';"
                                {{old('font_button_name',$configText->button_name->font)=="Arial Black"? 'selected':''}}>
                                <span class="ng-binding">Arial Black</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Arima Madurai" style="font-family:'Arima Madurai';"
                                {{old('font_button_name',$configText->button_name->font)=="Arima Madurai"? 'selected':''}}>
                                <span class="ng-binding">Arima Madurai</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Arvo" style="font-family:'Arvo';"
                                {{old('font_button_name',$configText->button_name->font)=="Arvo"? 'selected':''}}>
                                <span class="ng-binding">Arvo</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Baloo 2" style="font-family:'Baloo 2';"
                                {{old('font_button_name',$configText->button_name->font)=="Baloo 2"? 'selected':''}}>
                                <span class="ng-binding">Baloo 2</span>
                                </option>
                      </select>
                  </div>
                 </div>
            </div>
            <div class="size" style="    margin-left: 25%;">
                  <p class="input-label">Size</p>
                  <div class="form-group" style="width: 10%; height: 43px;">
                      <input class="form-control" type="number" name="size_button_name" value="{{$configText->button_name->size}}">
                  </div>
            </div>
            {{-- end BUTTON --}}
<hr>
            {{-- DISCLAIMER --}}
            <div class="form-group">
                <div class="form-group">
                    <div>
                        <p class="input-label" style="margin-top: 10px;">
                            <div class="checkbox without-checkbox">
                                <p>
                                    <div  style="font-weight: 800;">DISCLAIMER</div>
                                </p>
                            </div>
                        </p>
                        <textarea data-field="startScreen.disclaimer" rows="4" style="width: 70%;" name="content_name" id="post_content" class="form-control" style="resize: none;" onkeyup="changeFunction(this, event)">
                        {{ $configText->content_name->text }}
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="font" style="float: left" >
                <div class="lable">
                  <p class="input-label">Font</p>
                  <div class="form-group" style="width: 80%;">
                      <select class="form-control" name="font_content_name" id="font_content_name">
                            <!-- ngRepeat: item in list -->
                            <option  class="list-item ng-scope" value="Brush Script Std" style="font-family:'Brush Script Std';"
                                {{old('font_content_name',$configText->content_name->font)=="Brush Script Std"? 'selected':''}}>
                                <span class="ng-binding">Brush Script Std</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Stencil Std" style="font-family:'Stencil Std';"
                                {{old('font_content_name',$configText->content_name->font)=="Stencil Std"? 'selected':''}}>
                                <span class="ng-binding">Stencil Std</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Comic Sans MS" style="font-family:'Comic Sans MS';"
                                {{old('font_content_name',$configText->content_name->font)=="Comic Sans MS"? 'selected':''}}>
                                <span class="ng-binding">Comic Sans MS</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Lucida Console" style="font-family:'Lucida Console';"
                                {{old('font_content_name',$configText->content_name->font)=="Lucida Console"? 'selected':''}}>
                                <span class="ng-binding">Lucida Console</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Consolas" style="font-family:'Consolas';"
                                {{old('font_content_name',$configText->content_name->font)=="Consolas"? 'selected':''}}>
                                <span class="ng-binding">Consolas</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Times New Roman" style="font-family:'Times New Roman';"
                                {{old('font_content_name',$configText->content_name->font)=="Times New Roman"? 'selected':''}}>
                                <span class="ng-binding">Times New Roman</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Franklin Gothic Medium" style="font-family:'Franklin Gothic Medium';"
                                {{old('font_content_name',$configText->content_name->font)=="Franklin Gothic Medium"? 'selected':''}}>
                                <span class="ng-binding">Franklin Gothic Medium</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Arial" style="font-family:'Arial';"
                                {{old('font_content_name',$configText->content_name->font)=="Arial"? 'selected':''}}>
                                <span class="ng-binding">Arial</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Noto" style="font-family:'Noto';"
                                {{old('font_content_name',$configText->content_name->font)=="Noto"? 'selected':''}}>
                                <span class="ng-binding">Noto</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Arial Black" style="font-family:'Arial Black';"
                                {{old('font_content_name',$configText->content_name->font)=="Arial Black"? 'selected':''}}>
                                <span class="ng-binding">Arial Black</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Arima Madurai" style="font-family:'Arima Madurai';"
                                {{old('font_content_name',$configText->content_name->font)=="Arima Madurai"? 'selected':''}}>
                                <span class="ng-binding">Arima Madurai</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Arvo" style="font-family:'Arvo';"
                                {{old('font_content_name',$configText->content_name->font)=="Arvo"? 'selected':''}}>
                                <span class="ng-binding">Arvo</span>
                                </option>
                                <!-- end ngRepeat: item in list -->
                                <option  class="list-item ng-scope" value="Baloo 2" style="font-family:'Baloo 2';"
                                {{old('font_content_name',$configText->content_name->font)=="Baloo 2"? 'selected':''}}>
                                <span class="ng-binding">Baloo 2</span>
                                </option>
                      </select>
                  </div>
                 </div>
            </div>
            <div class="size" style="    margin-left: 25%;">
                  <p class="input-label">Size</p>
                  <div class="form-group" style="width: 10%; height: 43px;">
                      <input class="form-control" type="number" name="size_content_name" value="{{$configText->content_name->size}}">
                  </div>
            </div>
            {{-- end DISCLAIMER --}}
        @endif
@endforeach
</div>

