@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

<div class="admin" id="admin-lk" style="display: block;padding-top: 55px;">
     <form id="adminlk" class="form-horizontal" action="{{ url('lucky') }}" method="post" enctype="multipart/form-data">
         @csrf
         <div class="accordion">COUPONS</div>
          <div class="panel">
              @if(!$wheel)
                @include('coupons.layout')
              @else
                @include('coupons.edit')
              @endif
          </div>

          <div class="accordion">TEXT</div>
          <div class="panel">
              @if(!$wheel)
                @include('text.text')
              @else
                @include('text.edit_text')
              @endif
          </div>

          <div class="accordion">DESIGN</div>
          <div class="panel">
            @if(!$wheel)
                  @include('color.design')
            @else
                 @include('color.edit_design')
            @endif
          </div>

          <div class="accordion">TRIGGER</div>
          <div class="panel">
              @if(!$wheel)
                  @include('trigger.trigger')
              @else
                  @include('trigger.edit_trigger')
              @endif
          </div>

          <div class="accordion">SETTINGS</div>
          <div class="panel">
            @if(!$wheel)
                  @include('setting.setting')
              @else
                  @include('setting.edit_setting')
              @endif
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn" style="background-color: #008060;color: white;font-weight: 600;">Submit</button>
          </div>
     </form>
</div>
</div>
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
        "triggerType"  	=>	"simple",
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

@include('view')

@include('setup')
@stop
@section('css')
    <link rel="stylesheet"  type="text/css" href="{{ url('css/main.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/typo/typo.css" />
    <link rel="stylesheet" href="css/hc-canvas-luckwheel.css" />
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/stylesheet.css')}}" />
  <link rel="stylesheet" type="text/css" href="css/main.css">


<style type="text/css">
.blockCssClass{
      pointer-events: block;
  }
  .noneCssClass{
      pointer-events: none;
  }
.hc-luckywheel {
        position: fixed;
        width: 500px;
        height: 500px;
        border-radius: 50%;
        margin-top: 67px;
        z-index: 1;
        margin-left: 480px;
        border: 16px solid {{ $config->color->background }};
        box-shadow: 0 2px 3px #333, 0 0 2px #000;
      }

      .conntent-luckywheel {
        width: 742px;
        position: fixed;
        margin-left: 277px;
        margin-top: 40px;
        background-color: {{ $config->color->contentBgr}};
        border-radius: 13%;
        box-shadow: 1px 1px 1px 5px {{ $config->color->contentshadow}};
      }

      .content-wheel {
        width: 426px;
        margin-left: 300px;
      }

      .hc-luckywheel-item {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        color: {{ $config->color->cupponText }};
        font-weight: bold;
        text-shadow: 0 1px 1px rgba(255, 255, 255, 0.6);
      }
    aside.main-sidebar.sidebar-dark-primary.elevation-4 {
    background: white;
    font-size: 16px;
    font-weight: 700;
    position: fixed;
    }
    li.nav-item:hover {
        background: cornflowerblue;
    }
      button#buttonname {
          height: 40px;
          margin-top: 13px;
          width: auto;
          min-width: 247px;
          margin: 0;
          padding: 0;
          font-weight: 800;
          font-size: 18px;
          line-height: 17px!important;
          text-align: center;
          letter-spacing: 1px;
          background: {{ $config->color->buttonColor }};
          color: {{ $config->color->buttonText }};
          box-shadow: 7px 6px 0 0 {{ $config->color->buttonShadow }};
          outline: none;
          font-family: {{$config->text->button_name->font}};
          font-size: {{$config->text->button_name->size}}px";
    }
      button#myBtn {
          background: {{ $config->trigger->colorBackground }};
          color: {{ $config->trigger->colorText }};
          font-size: initial;
          transform: rotate(-90deg);
          font-weight: 800;
          top: 490px;
          position: fixed;
          z-index: 100;
          padding: 5px 10px 5px 10px;
      }
      button#myBtn {
              background: {{ $config->trigger->colorBackground }};
              color: {{ $config->trigger->colorText }};
              font-size: initial;
              transform: rotate(-90deg);
              font-weight: 800;
              top: 490px;
              position: fixed;
              z-index: 100;
              padding: 5px 10px 5px 10px;
          }

      .trigger-main-content {
		    display: inline-block;
		    padding: 0;
		    width: 140px;
		    height: 140px;
		    color: {{ $config->trigger->colorText }};
		    background: {{ $config->trigger->colorBackground }} !important;
		    cursor: pointer!important;
		    font-family: "Roboto", sans-serif!important;
		    z-index: 999999;
		    -webkit-transform: translate(0%, -50%);
		    transform: translate(0%, -50%);
		    border-radius: 50%;
		    box-shadow: 3px 3px 3px 0 #555;
		    border-style: solid;
		    border-color: #fff;
		    border-width: 6px;
        top: 490px;
        position: fixed;
        z-index: 100;
		}
    p#lbldesktopsecond {
    font-size: initial;
    font-family: {{$config->text->desktopsecond->font}};
    font-size: {{$config->text->desktopsecond->size}}px";
    }
    button#update:hover {
        background: red;
        color: black;
    }
</style>
@stop
@section('js')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="js/hc-canvas-luckwheel.js"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
<!-- show hide tow div -->
<script type="text/javascript">
		$(document).ready(function() {
	    $("input[name$='triggerType']").click(function() {
	        var valThis = $(this).val();
          $("input[name$='triggerType']").each(function() {
            if($(this).val() == valThis){
              $('#'+ valThis).show();
            }else{
              $('#'+ $(this).val()).hide();
            }
          })
	    });
	});
</script>

<script type="text/javascript">
            var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
              URL.revokeObjectURL(output.src) // free memory
            }
          };
</script>

<script  type="text/javascript">
    $(document).ready(function(){
      $('select').on('change', function(){
            var valueThis = $(this).val();
            console.log(valueThis);
      });
    })
</script>

<script  type="text/javascript">
    $(document).ready(function(){
      $('select').on('change', function(){
            var valueThis = $(this).val();
            // console.log(valueThis);
            $('select').each(function(){
                // console.log($(this).val());
            })
      });
    })
</script>


    <script>
      $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').on('click', function(event) {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            $('.nav-item a[href*="#"]').each(function(){
                var hideForm = $(this).attr('href');
                $(this).parent().removeClass('active');
                if(hideForm != '#') $(hideForm).hide();
            });
            $(this).parent().addClass('active');
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            target.show();
            if (target.length) {
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 50
                }, 1000, function() {
                    var $target = $(target);
                    $target.focus();
                    if ($target.is(":focus")) {
                        return false;
                    } else {
                        $target.attr('tabindex','-1');
                        $target.focus();
                    };
                });
            }
        }
    });
</script>


    <!-- show-hide-modal-button -->
<script type="text/javascript">
      var $tltbtfBtn = $("#btfBtn");
      $(document).on('change', "input[type=radio][name=showPlayGameTrigger]", function() {
        var radVal = $(this).val();
        localStorage.setItem('lk', radVal);
        if (radVal == 'show') {
          $tltbtfBtn.addClass('showCssClass').removeClass('hideCssClass');
        } else if (radVal == 'hide') {
          $tltbtfBtn.addClass('hideCssClass').removeClass('showCssClass')
        }
      });
      if(localStorage.getItem('lk') != null){
            if(localStorage.getItem('lk') == 'show'){
                $('input[name="showPlayGameTrigger"][value="show"]').attr('checked', true);
                $('#btfBtn').show();
            }else{
                $('#btfBtn').hide();
            }
        }
</script>

    <!-- show-hide-modal-simple -->
<script type="text/javascript">
      var $tltmyBtn = $("#myBtn");
      $(document).on('change', "input[type=radio][name=showPlayGameTrigger]", function() {
        var radVal = $(this).val();
        localStorage.setItem('lk', radVal);
        if (radVal == 'show') {
          $tltmyBtn.addClass('showCssClass').removeClass('hideCssClass');
        } else if (radVal == 'hide') {
          $tltmyBtn.addClass('hideCssClass').removeClass('showCssClass')
        }
      });
      if(localStorage.getItem('lk') != null){
            if(localStorage.getItem('lk') == 'show'){
                $('input[name="showPlayGameTrigger"][value="show"]').attr('checked', true);
                $('#myBtn').show();
            }else{
                $('#myBtn').hide();
            }
        }
</script>

<!-- Trigger position simple -->
<script type="text/javascript">
      var $myBtn = $("#myBtn");
      $(document).on('change', "input[type=radio][name=triggerPosition]", function() {
        var radVal = $(this).val();
        localStorage.setItem('lk-css', radVal);
        if (radVal == 'right') {
          $myBtn.addClass('rightCssClass').removeClass('leftCssClass');
        } else if (radVal == 'left') {
          $myBtn.addClass('leftCssClass').removeClass('rightCssClass');
        }
      });
      if(localStorage.getItem('lk-css') != null){
            if(localStorage.getItem('lk-css') == 'right'){
                $('input[name="triggerPosition"][value="right"]').attr('checked', true);
                $('#myBtn').addClass('rightCssClass').removeClass('leftCssClass');
            }else{
                $('#myBtn').addClass('leftCssClass').removeClass('rightCssClass');
            }
        }
</script>

<!-- Trigger position button-->
<script type="text/javascript">
      var $btfBtn = $("#btfBtn");
      $(document).on('change', "input[type=radio][name=triggerPosition]", function() {
        var radVal = $(this).val();
        localStorage.setItem('lk-css', radVal);
        if (radVal == 'right') {
          $btfBtn.addClass('rightCssClass').removeClass('leftCssClass');
        } else if (radVal == 'left') {
          $btfBtn.addClass('leftCssClass').removeClass('rightCssClass');
        }
      });
      if(localStorage.getItem('lk-css') != null){
            if(localStorage.getItem('lk-css') == 'right'){
                $('input[name="triggerPosition"][value="right"]').attr('checked', true);
                $('#btfBtn').addClass('rightCssClass').removeClass('leftCssClass');
            }else{
                $('#btfBtn').addClass('leftCssClass').removeClass('rightCssClass');
            }
        }
</script>

<script>
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
  modal.style.display = "block";
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>


<script>
function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("myTable").deleteRow(i);
}
</script>
<script type="text/javascript">
            var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
              URL.revokeObjectURL(output.src) // free memory
            }
          };
</script>

<script  type="text/javascript">
    $(document).ready(function(){
      $('select').on('change', function(){
            var valueThis = $(this).val();
            console.log(valueThis);
      });
    })
</script>

<!-- add row -->
<script type="text/javascript">

	$(function(){
  var _counter = 1;
  $(document).on('click', '#addrow', function(){
    var cloneHtml = $('.lucky-item:first-child').clone();
    cloneHtml.appendTo('.clone-name');
    cloneHtml.find('img').remove();
    cloneHtml.find('input[type="file"]').attr('required', 'true');
  });
});
</script>

<script>
function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("myTable").deleteRow(i);
}
</script>



<!-- COUNTER TIMER -->
<script type="text/javascript">
        // Set the date we're counting down to
        var countDownDate = new Date("{{ $config->trigger->birthdaytime }}").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

          // Get today's date and time
          var now = new Date().getTime();

          // Find the distance between now and the count down date
          var distance = countDownDate - now;

          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);

          // Output the result in an element with id="demo"
          document.getElementById("time").innerHTML = days + "d " + hours + "h "
          + minutes + "m " + seconds + "s ";

          // If the count down is over, write some text
          if (distance < 0) {
            clearInterval(x);
            document.getElementById("button").style = "display:none";
          }
        }, 1000);
</script>

<!-- show hide modal timeout -->
<script type="text/javascript">
    var d = new Date();
    var dayOfWeek = d.getDay();
    var hour = d.getHours();
    var mins = d.getMinutes();
    var status = 'open';
    if (dayOfWeek !== {{ $config->setting->day_hide  }} && hour >= {{ $config->setting->start_time  }} && hour < {{ $config->setting->end_time }}){
        if (hour=='9' && mins < '30'){
            status = 'closed';
        }else{
            status = 'open';
        }
    }else{
        status = 'closed';
    }
    if (status=='open') {
        $('.modal-btn').show();
    }else{
        $('.modal-btn').hide();
    }
</script>

<!-- Trigger position button -->
<script>
  $(document).on('change', "input[type=radio][name=triggerPosition]", function() {
        var radVal = $(this).val();
        localStorage.setItem('lk-css', radVal);
        if (radVal == 'right') {
          $btfBtn.addClass('rightCssClass').removeClass('leftCssClass');
        } else if (radVal == 'left') {
          $btfBtn.addClass('leftCssClass').removeClass('rightCssClass');
        }
      });
      if(localStorage.getItem('lk-css') != null){
            if(localStorage.getItem('lk-css') == 'right'){
                $('input[name="triggerPosition"][value="right"]').attr('checked', true);
                $('#btfBtn').addClass('rightCssClass').removeClass('leftCssClass');
            }else{
                $('#btfBtn').addClass('leftCssClass').removeClass('rightCssClass');
            }
        }
</script>

@stop
