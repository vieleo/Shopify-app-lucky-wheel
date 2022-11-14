<div id="myModal" class="modal">
    <?php
    $config = json_decode($wheel->configall);
  ?>
 <?php
    $count = 0;
   foreach ($config as $whell_config){
      $count += $whell_config->chance;
   }

?>
 <script>
      var isPercentage = true;
      var prizes = [
      @if($config)
            @foreach ($config as $whell_config)

            {
                text:  "{{ $whell_config->name}}",
                img: "{{ 'tmp/uploads/'.$whell_config->image}}",
                number: 1,
                percentpage:  {{ $whell_config->chance }}
              },

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
                  'Chương trình kết thúc',
                  'Đã hết phần thưởng',
                  'error'
                )
              }
               else if (data == 'Chúc bạn may mắn lần sau'){
                Swal.fire(
                  'Bạn không trúng thưởng',
                  data,
                  'error'
                )
              }
               else{
                Swal.fire(
                  'Đã trúng giải',
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
                  >Vòng Xoay May Mắn</canvas
                >
              </div>
              <a class="hc-luckywheel-btn" href="javascript:;">Xoay</a>
          </section>
        </div>
    </div>

    <div class="ct-luckywheel">
      <div class="conntent-luckywheel">
          <h1 style="font-size: 40px;font-weight: 700;color: {{ $color->converText }};" id="lbldesktopfirst" class="lbldesktopfirst desktopfirst">{{ $content->desktopfirst }}</h1>
          <h3 id="lbldesktopsecond" class="desktopsecond">{{ $content->desktopsecond }}</h3>
          <button id="buttonname" class="launcher" data-text="startScreen.button" >
                <p id="buttontext">{{ $content->button_name }}</p>
          </button>
          <p id="lbldisclaimerText" style="margin-top: 5px;font-weight: 500;text-align: left;font-size: 10px;padding: 15px 0 0;text-decoration-line: none;opacity: 0.8;color: {{ $color->disclaimerText }};">
          <?php echo $content->content_name ?>
          </p>
      </div>
    </div>
    </div>
