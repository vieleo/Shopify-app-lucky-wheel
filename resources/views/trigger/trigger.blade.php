<div class="container trigger-lk">

    <div class="panel-default site-panel" >
        <div class="panel-body">
            <div class="row">
            <div>
                <div style="min-width: 340px;">
                <div class="wrapper" style="    display: flex;">
                    <div class="left-trigger" style="margin-right: 147px; margin-left: 76px;">
                        <div class="form-group">
                            <label class="input-label">Trigger title</label>
                            <input data-field="textTrigger" name="title_simple" type="text" value="SPIN THE WHEEL!" class="form-control" onkeyup="changeFunction(this, event)">
                        </div>
                        <div class="form-group">
                            <label class="input-label">TRIGGER SUB-TITLE</label>
                            <input  name="title_sub" type="text" value="Not Redeemed" class="form-control" onkeyup="changeFunction(this, event)">
                        </div>
                        <div class="form-group">
                            <label class="input-label">ACTIVATE WITHIN</label>
                            <input  name="active_within" type="text" value="Activate within" class="form-control" onkeyup="changeFunction(this, event)">
                        </div>
                    </div>

                    <div class="right-trigger" style="width: 360px ">
                        <div class="form-group">
                            <label class="input-label">Counter timer</label>
                            <div class="checkbox">
                                <label>
                                <span>
                                     <input type="datetime-local" id="birthdaytime" name="birthdaytime">
                                </label>
                            </div>
                        </div>
                        <div class="design trigger-colors">
                            <div class="line custom">
                            <label class="input-label">Colors</label>
                            <div class="color-lk">
                                <div class="color-text" style="float: left;    margin-right: 49px;">
                                    <p style="float: left; margin-right: 14px;">Text</p>
                                    <input type="color" name="colorText" id="background" value="#ffffff" title="Choose your color">
                                </div>
                                <div class="color-bgr">
                                    <p style="float: left; margin-right: 14px;">background</p>
                                    <input type="color" name="colorBackground" id="background" value="#eb0000" title="Choose your color">
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
                            <input type="radio" name="triggerPosition" value="right" class="triggerPosition"> Right <span class="custom-input"></span>
                        </label>
                        </div>
                        <div class="radio_left">
                        <label>
                            <input type="radio" name="triggerPosition" value="left" class="triggerPosition"> Left <span class="custom-input"></span>
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
                            <input type="radio" name="showPlayGameTrigger" value="show" onclick="show();"> Yes
                            </label>
                        </div>
                        <div class="radio _hide">
                            <label>
                            <input type="radio" name="showPlayGameTrigger"  value="hide" onclick="hide();"> No
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


