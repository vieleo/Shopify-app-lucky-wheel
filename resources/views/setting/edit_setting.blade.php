<?php
    $config = json_decode($wheel->configall);

?>
<div class="" id="lk-setting">
          @foreach ($config as $key => $setting)
              @if($key == 'setting')

              <div class="col-md-12 gap">
                <label class="input-label">For how many times?</label>
                <div class="radio _custom">
                  <label>
                    <input type="radio" name="frequency" value="" data-name="onEveryPageView" {{ ($setting->frequency=="")? "checked" : "" }} > On every page view <span class="custom-input"></span>
                  </label>
                </div>
                <div class="radio _custom">
                  <label>
                    <input type="radio" name="frequency" value="1" data-name="notMoreThanOnceEveryNumberTimePerUser" {{ ($setting->frequency=="1")? "checked" : "" }}> Not more than once every <span class="custom-input"></span>
                    {{-- <input type="text" disabled="disabled" class="form-control input-sm" style="width: 50px; display: inline-block;" value="1"> --}}
                    {{-- <select disabled="disabled" class="form-control input-sm" style="display: inline-block; width: 80px;" >
                      <option>day</option>
                      <option>week</option>
                      <option>month</option>
                    </select> per user </label> --}}
                </div>
              </div>

                <div class="col-md-12">
                  <label class="input-label">When to display the game?</label>
                  <div>
                    <label>
                          <label>
                            <span class="custom-input custom-checkbox"></span>
                            Golden hour from
                            <input type="number" class="form-control input-sm" name="start_time" value="{{ $setting->start_time }}" style=" display: inline-block;" min="0" max="24">
                            to
                            <input type="number" class="form-control input-sm" name="end_time" value="{{ $setting->end_time }}" style=" display: inline-block;" min="0" max="24">
                          </label>
                    </label>
                  </div>
                </div>

                <div class="col-md-12">
                  <label class="input-label">Day of the week hide events?</label>
                  <div>
                  <div class="form-group" style="width:50%">
                      <select class="form-control" name="day_hide" id="day_hide">
                        <option value="1"{{old('day_hide',$setting->day_hide)=="1"? 'selected':''}}>Monday</option>
                        <option value="2"{{old('day_hide',$setting->day_hide)=="2"? 'selected':''}}>Tuesday</option>
                        <option value="3"{{old('day_hide',$setting->day_hide)=="3"? 'selected':''}}>Wednesday</option>
                        <option value="4"{{old('day_hide',$setting->day_hide)=="4"? 'selected':''}}>Thursday</option>
                        <option value="5"{{old('day_hide',$setting->day_hide)=="5"? 'selected':''}}>Friday</option>
                        <option value="6"{{old('day_hide',$setting->day_hide)=="6"? 'selected':''}}>Saturday</option>
                        <option value="0"{{old('day_hide',$setting->day_hide)=="0"? 'selected':''}}>Sunday</option>
                      </select>
                  </div>
                  </div>
                </div>
              @endif
          @endforeach
</div>
