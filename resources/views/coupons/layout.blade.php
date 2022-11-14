

<div class="lucky-wheel" id="luckywheel">

        <div class="lucky-wheel">
          <input type="hidden" class="shop_http" name="shop_modun" value="{{ $shop_modun['shop_name'] }}">
          <table class="table table-hover">
              <thead>
                    <tr>
                      <!-- <th scope="col">#</th> -->
                      <th scope="col">TYPE</th>
                      <th scope="col" id="coupon">COUPON CODE</th>
                      <th scope="col" id="gravity">GRAVITY / CHANCE</th>
                    </tr>
              </thead>
              <tbody class="clone-name" >
                    <tr>
                      <td><input type="text" class="form-control" id="name" name="name[]" placeholder="name"></td>
                      <td><input type="file" class="form-control" accept=".jpg, .png, .gif" name="image[]" ></td>
                      <td>
                        <select class="selectpicker" data-live-search="true" name="chance[]">
                           <option>0</option>
                           <option>10</option>
                           <option>20</option>
                           <option>30</option>
                           <option>40</option>
                           <option>50</option>
                           <option>60</option>
                           <option>70</option>
                           <option>80</option>
                           <option>90</option>
                           <option>100</option>
                        </select>
                      </td>
                      <td><input type="button" value="Delete" onclick="deleteRow(this)"></td>
                    </tr>
                    <tr>
                      <td><input type="text" class="form-control" id="name" name="name[]" placeholder="name"></td>
                      <td><input type="file" class="form-control" name="image[]" accept=".jpg, .png, .gif" multiple /></td>
                      <td>
                        <select class="selectpicker" data-live-search="true" name="chance[]">
                           <option>0</option>
                           <option>10</option>
                           <option>20</option>
                           <option>30</option>
                           <option>40</option>
                           <option>50</option>
                           <option>60</option>
                           <option>70</option>
                           <option>80</option>
                           <option>90</option>
                           <option>100</option>
                        </select>
                      </td>
                      <td><input type="button" value="Delete" onclick="deleteRow(this)"></td>
                      </tr>
                      <tr>
                      <td><input type="text" class="form-control" id="name" name="name[]" placeholder="name"></td>
                      <td><input type="file" class="form-control" name="image[]" accept=".jpg, .png, .gif" multiple /></td>
                      <td>
                        <select class="selectpicker" data-live-search="true" name="chance[]">
                           <option>0</option>
                           <option>10</option>
                           <option>20</option>
                           <option>30</option>
                           <option>40</option>
                           <option>50</option>
                           <option>60</option>
                           <option>70</option>
                           <option>80</option>
                           <option>90</option>
                           <option>100</option>
                        </select>
                      </td>
                      <td><input type="button" value="Delete" onclick="deleteRow(this)"></td>
                    </tr>


              </tbody>
              <tfoot>
                <tr>
                  <td colspan="3">
                    <input type="button" id="addrow" class="btn btn-primary" value="Add One More Row">&nbsp;
                  </td>
                </tr>
              </tfoot>
          </table>
        </div>

    </div>

  </div>
