<?php
    $config = json_decode($wheel->configall);

?>
<div class="container trigger-lk">
        @foreach ($config as $key => $trigger)

        @if($key == 'trigger')
    <div class="panel-default site-panel" >
        <div class="panel-body">
            <div class="row">
            <div>
                <div style="min-width: 340px;">
                <div class="wrapper" style="    display: flex;">

                    <div class="left-trigger" style="margin-right: 147px; margin-left: 76px;">
                        <div class="form-group">
                            <label class="input-label">TRIGGER TITLE</label>
                            <input  name="title_simple" type="text" value="{{ $trigger->title_simple }}" class="form-control" onkeyup="changeFunction(this, event)">
                        </div>
                        <div class="form-group">
                            <label class="input-label">TRIGGER SUB-TITLE</label>
                            <input  name="title_sub" type="text" value="{{ $trigger->title_sub }}" class="form-control" onkeyup="changeFunction(this, event)">
                        </div>
                        <div class="form-group">
                            <label class="input-label">ACTIVATE WITHIN</label>
                            <input  name="active_within" type="text" value="{{ $trigger->active_within }}" class="form-control" onkeyup="changeFunction(this, event)">
                        </div>

                    </div>
                    <div class="right-trigger" style="width: 360px ">
                        <div class="form-group">
                            <label class="input-label">Counter timer</label>
                            <div class="checkbox">
                                <label>
                                <span>
                                    <input type="datetime-local" id="birthdaytime" name="birthdaytime" value="{{ $trigger->birthdaytime }}">
                                </label>
                            </div>
                        </div>
                        <div class="design trigger-colors">
                            <div class="line custom">
                                <label class="input-label">Colors</label>
                                <div class="color-lk">
                                    <div class="color-text" style="float: left;    margin-right: 49px;">
                                        <p style="float: left; margin-right: 14px;">Text</p>
                                        <input type="color" name="colorText" id="background" value="{{ $trigger->colorText }}" title="Choose your color">
                                    </div>
                                <div class="color-bgr">
                                    <p style="float: left; margin-right: 14px;">background</p>
                                    <input type="color" name="colorBackground" id="background" value="{{ $trigger->colorBackground }}" title="Choose your color">
                                </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="lable_position">
                                <b><label class="input-label">Trigger position</label></b>
                            </div>
                            <div class="radio_right" style="float: left;    margin-right: 26px;">
                            <label>
                                <input type="radio" name="triggerPosition" value="right" class="triggerPosition" {{ $trigger->triggerPosition=="right" ? "checked" : "" }}> Right <span class="custom-input"></span>
                            </label>
                            </div>
                            <div class="radio_left">
                            <label>
                                <input type="radio" name="triggerPosition" value="left" class="triggerPosition" {{ $trigger->triggerPosition=="left" ? "checked" : "" }}> Left <span class="custom-input"></span>
                            </label>
                            </div>
                        </div>
                        <div>
                            <div class="show_play">
                                <b>
                                    <label class="input-label">Show play game trigger?</label>
                                </b>
                            </div>

                            <div class="radio _show" style="float: left;    margin-right: 26px;">
                                <label>
                                <input type="radio" name="showPlayGameTrigger" id="show_btn" value="show" {{ $trigger->showPlayGameTrigger=="show" ? "checked" : "" }}> Yes
                                </label>
                            </div>
                            <div class="radio _hide">
                                <label>
                                <input type="radio" name="showPlayGameTrigger" id="show_btn"  value="hide" {{ $trigger->showPlayGameTrigger=="hide" ? "checked" : "" }}> No
                                </label>
                            </div>
                        </div>
                </div>

                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    @endif
     @endforeach
    </div>


