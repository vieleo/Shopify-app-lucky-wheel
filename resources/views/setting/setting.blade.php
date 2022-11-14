<div class="row-content" id="lk-text" style="display: block;">
                <div class="col-md-12 gap">
                  <label class="input-label">For how many times?</label>
                  <div class="radio _custom">
                    <label>
                      <input type="radio" name="frequency" value="" data-name="onEveryPageView" checked> On every page view <span class="custom-input" checked></span>
                    </label>
                  </div>
                  <div class="radio _custom">
                    <label>
                      <input type="radio" name="frequency" value="1" data-name="notMoreThanOnceEveryNumberTimePerUser"> Not more than once every <span class="custom-input"></span>
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
                            <input type="number" class="form-control input-sm" name="start_time" style=" display: inline-block;" value="0" min="0" max="24">
                            to
                            <input type="number" class="form-control input-sm" name="end_time" style=" display: inline-block;" value="24" min="0" max="24">
                          </label>
                    </label>
                  </div>
                </div>



                <div class="col-md-12">
                  <label class="input-label">Day of the week hide events?</label>
                  <div class="form-group" style="width:50%">
                      <select class="form-control" name="day_hide" id="day_hide">
                        <option value="1">Monday</option>
                        <option value="2">Tuesday</option>
                        <option value="3">Wednesday</option>
                        <option value="4">Thursday</option>
                        <option value="5">Friday</option>
                        <option value="6">Saturday</option>
                        <option value="0">Sunday</option>
                      </select>
                  </div>
                </div>
     </div>



