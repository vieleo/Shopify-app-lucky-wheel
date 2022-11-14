<div class="container" id="view-lk" style="display: none;">

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
  <script>
        var isPercentage = true;
        var prizes = [
        @if($config)
              @foreach ($config as $key =>$whell_config)
                  @if($key == 'coupons')
                  @foreach ($whell_config as $config_app)
                {
                    text:  "{{ $config_app->name}}",
                    img: "{{ 'tmp/uploads/'.$config_app->image}}",
                    number: 1,
                    percentpage:  {{ $config_app->chance }}
                  },
                  @endforeach
                  @endif
             @endforeach

        @endif
              ];
        var arrValues = [];
        document.addEventListener(
          "DOMContentLoaded",
          function() {
            hcLuckywheel.init({
              id: "luckywheel",
              config: function(callback) {
                callback &&
                  callback(prizes);
              },
              mode : "both",
              getPrize: function(callback) {
                var rand = randomIndex(prizes);
                var chances = rand;
                callback && callback([rand, chances]);
              },
              gotBack: function(data) {
                if(data == null){
                        Swal.fire(
                          'THE PROGRAM ENDS',
                          'THE REWARD IS OVER',
                          'error'
                        )
                      }
                      else if (data == 'WISH YOU LUCK NEXT TIME'){
                        Swal.fire(
                          'WISH YOU LUCK NEXT TIME',
                          data,
                          'error'
                        )
                      }
                      else{
                        Swal.fire(
                          'CONGRATULATION!',
                          data,
                          'success'
                        )
                }
              }
            });
          },
          false
        );
        function randomIndex(prizes){
          if (typeof arrValues !== 'undefined' && arrValues.length === 0) {
            prizes.forEach((item, index)=>{
              num = item.percentpage;
              for(var i=0; i<num; i++){
                arrValues.push(index);
              };
            });
          }
          randomIdx = Math.floor(Math.random()*arrValues.length)
          type = arrValues[randomIdx]
          delete arrValues[randomIdx];
          return type
        }
  </script>
    <div class="content2">
      <div class="wrapper typo" id="wrapper">
        <section id="luckywheel" class="hc-luckywheel">
              <div class="hc-luckywheel-container">
                <canvas class="hc-luckywheel-canvas" width="500px" height="500px"
                  >Vòng Xoay May Mắn</canvas>
              </div>
              <a class="hc-luckywheel-btn" href="javascript:;" id="launcher" onclick="myfns()">SPIN</a>
          </section>
        </div>
    </div>

    <div class="ct-luckywheel">
      <div class="conntent-luckywheel">
        <div class="content-wheel">
              <h1 style="font-size: 40px;font-weight: 700;color: {{ $config->color->converText }}; font-family: {{$config->text->desktopfirst->font}}; font-size: {{$config->text->desktopfirst->size}}px" id="lbldesktopfirst" class="lbldesktopfirst desktopfirst">{{ $config->text->desktopfirst->text }}</h1>
              <p id="lbldesktopsecond" class="desktopsecond">{{ $config->text->desktopsecond->text }}</p>
              <div class="form-group">
                <input type="email" class="form-control" id="exampleInputEmail1" style="width:50%" placeholder="Enter email">
              </div>
              <button id="buttonname" class="launcher" data-text="startScreen.button" onclick="myfns()">
                    <p id="buttontext">{{ $config->text->button_name->text }}</p>
              </button>
              <p id="lbldisclaimerText" style="margin-top: 5px;font-weight: 500;text-align: left;font-size: 10px;padding: 15px 0 0;text-decoration-line: none;opacity: 0.8;color: {{ $config->color->disclaimerText }}; font-family: {{$config->text->content_name->font}}; font-size: {{$config->text->content_name->size}}px">
              {{ $config->text->content_name->text }}
              </p>
        </div>
      </div>
    </div>

    <div id="button" class="desc modal-btn">
        <div class="trigger-main-content" id="btfBtn">
              <div data-name="newTrigger" data-text="newTrigger" class="trigger-main-text">{{ $config->trigger->title_simple }}</div>
              <div data-name="subTrigger" data-text="subTrigger" class="trigger-sub-text">{{ $config->trigger->title_sub }}</div>
              <div class="trigger-timer-content" style="display: block;">
                <div data-name="activateWithin" data-text="activateWithin" class="trigger-bottom-text">{{$config->trigger->active_within}}</div>
                <div data-name="counterTimerMinutes" data-text="counterTimerMinutes" class="trigger-bottom-timer">
                <span id="time"></span>
                </div>
              </div>
        </div>
    </div>
    <script type="text/javascript">
      var count = 0;
      function myfns(){
      count++;
      if (count = {{ $config->setting->frequency }}){
      document.getElementById("buttonname").disabled = true;
        $(document).find('#launcher').addClass('noneCssClass');
      }
      }
    </script>

</div>
