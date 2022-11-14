
<?php
    $config = json_decode($wheel->configall);
?>
 <?php
    $count = 0;
    $countKey = 0;
   foreach ($config as  $key => $whell_config){
    if($key == 'coupons'){
      foreach ($whell_config as $value){
        $count += $value->chance;
        $countKey+=1;

      }
    }
   }
?>
<style>
body

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(255, 248, 248); /* Fallback color */
  background-color: rgba(255, 251, 251, 0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)}
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #000000;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
<div class="lucky-wheel">
        <input type="hidden" class="config_id" name="config_id" value="{{ $wheel->id }}">
        <div class="lucky-wheel">
          <table class="table table-hover" id="myTable" style="background: white;">
              <thead>
                    <tr>
                      <th scope="col">TYPE</th>
                      <th scope="col" id="coupon">COUPON CODE</th>
                      <th scope="col" id="gravity">GRAVITY / CHANCE</th>
                      <th></th>
                    </tr>
              </thead>
              <tbody class="clone-name" >
                  @foreach ($config as $key => $configs)
                  @if($key == 'coupons')
                  @foreach ($configs as $config_app)
                    <tr class="lucky-item" value="0">
                      <td><input type="text" class="form-control" name="name[]" value="{{ $config_app->name }}"></td>
                      <td>
                        <div>
                        <img id="myImg" class="myImages" src="{{ URL::to('tmp/uploads/'.$config_app->image)}}" height="50px" width="50px" style="float:left" >
                        <input type="file" class="form-control" accept=".jpg, .png, .gif" name="image[]" style="width: 240px;">

                        <input  type="hidden" value="{{$config_app->image}}" name="img_hide[]">
                        </div>
                      </td>
                      <td>
                        <div class="count" style="margin-top: 16px;">
                        <select class="selectpicker" data-live-search="true" name="chance[]" style="float: left;border-radius: 18%;">
                           <option value="0"  @if($config_app->chance == 0) selected  @endif >0</option>
                           <option value="10" @if($config_app->chance == 10) selected  @endif>10</option>
                           <option value="20" @if($config_app->chance == 20) selected  @endif>20</option>
                           <option value="30" @if($config_app->chance == 30) selected  @endif>30</option>
                           <option value="40" @if($config_app->chance == 40) selected  @endif>40</option>
                           <option value="50" @if($config_app->chance == 50) selected  @endif>50</option>
                           <option value="60" @if($config_app->chance == 60) selected  @endif>60</option>
                           <option value="70" @if($config_app->chance == 70) selected  @endif>70</option>
                           <option value="80" @if($config_app->chance == 80) selected  @endif>80</option>
                           <option value="90" @if($config_app->chance == 90) selected  @endif>90</option>
                           <option value="100" @if($config_app->chance == 100) selected  @endif>100</option>
                        </select>
                          <p style="margin-left: 80px;font-weight: 600;">{{ round(($config_app->chance/$count),2) }}</p>
                      </div>
                      </td>
                      <td><input type="button" value="Delete" onclick="deleteRow(this)"></td>
                    </tr>
                    @endforeach
                    @endif
                    @endforeach
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

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close" style="padding-top: 5%">&times;</span>
  <img class="modal-content" id="img01" style="width: 500px; height:500px">
</div>

<script>
// create references to the modal...
var modal = document.getElementById('myModal');
// to all images -- note I'm using a class!
var images = document.getElementsByClassName('myImages');
// the image in the modal
var modalImg = document.getElementById("img01");
// and the caption in the modal
var captionText = document.getElementById("caption");

// Go through all of the images with our custom class
for (var i = 0; i < images.length; i++) {
  var img = images[i];
  // and attach our click listener for this image.
  img.onclick = function(evt) {
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }
}

var span = document.getElementsByClassName("close")[0];

span.onclick = function() {
  modal.style.display = "none";
}

</script>
